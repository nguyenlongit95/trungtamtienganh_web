<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\Tags\TagsRepositoryInterface;
use App\Validations\Validation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogRepository;
    protected $tagsRepository;

    public function __construct(
        BlogRepositoryInterface $blogRepository,
        TagsRepositoryInterface $tagsRepository
    )
    {
        $this->blogRepository = $blogRepository;
        $this->tagsRepository = $tagsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blogRepository->getAll(config('const.paginate'), 'DESC');

        return view('admin.pages.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = $this->tagsRepository->listAll();

        return view('admin.pages.blog.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validation::validationBlog($request);
        $param = $request->all();
        $blog = $this->blogRepository->create($param);
        if (!$blog) {
            return redirect()->back()->with('status', config('const.add.failed'));
        }
        // add tags
        $assignTags = $this->blogRepository->assignTags($param['tags'], $blog);
        if ($assignTags) {
            return redirect('/admin/blog')->with('status', config('langVN.add.success'));
        }

        return redirect()->back()->with('status', config('const.add.failed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @param  int $id of blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog, $id)
    {
        $blog = $this->blogRepository->find($id);
        if (!$blog) {
            return redirect('/admin/blog')->with('status', config('langVN.data_not_found'));
        }
        $tags = $this->tagsRepository->listAll();
        $assignTags = $this->blogRepository->getAssignTags($blog);

        return view('admin.pages.blog.edit', compact('blog', 'tags', 'assignTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id of blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validation::validationBlog($request);
        // Check blog
        $blog = $this->blogRepository->find($id);
        if (empty($blog)) {
            return redirect()->back()->with('status', config('langVN.data_not_found'));
        }
        // Update blog
        $param = $request->all();
        $update = $this->blogRepository->update($param, $id);
        if (!$update) {
            return redirect()->back()->with('status', config('langVN.update.failed'));
        }
        // remove all tags
        $this->blogRepository->removeAssignTags($blog);
        // add tags again
        $assignTags = $this->blogRepository->assignTags($param['tags'], $blog);
        if ($assignTags) {
            return redirect('/admin/blog/' . $id . '/edit')->with('status', config('langVN.update.success'));
        }

        return redirect()->back()->with('status', config('langVN.update.failed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @param  int $id of blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog, $id)
    {
        $blog = $this->blogRepository->find($id);
        if (!$blog) {
            return redirect('/admin/article')->with('status', config('langVN.data_not_found'));
        }
        // remove assign tags
        $this->blogRepository->removeAssignTags($blog);
        $delete = $this->blogRepository->delete($id);
        if ($delete) {
            return redirect('/admin/blog')->with('status', config('langVN.delete.success'));
        }

        return redirect('/admin/blog')->with('status', config('langVN.delete.failed'));
    }

    /**
     * Function controller search blogs
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $param = $request->all();
        $blogs=  $this->blogRepository->search($param);

        return view('admin.pages.blog.index', compact('blogs'));
    }
}
