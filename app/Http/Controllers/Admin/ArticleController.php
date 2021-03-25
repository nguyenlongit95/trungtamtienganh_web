<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Repositories\Article\ArticleRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Tags\TagsRepositoryInterface;
use App\Validations\Validation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @var ArticleRepositoryInterface
     */
    protected $articleRepository;
    protected $categoryRepository;
    protected $tagsRepository;

    /**
     * ArticleController constructor.
     * @param ArticleRepositoryInterface $articleRepository
     * @param CategoryRepositoryInterface $categoryRepository
     * @param TagsRepositoryInterface $tagsRepository
     */
    public function __construct(
        ArticleRepositoryInterface $articleRepository,
        CategoryRepositoryInterface $categoryRepository,
        TagsRepositoryInterface $tagsRepository
    )
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagsRepository = $tagsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->articleRepository->getAll(config('const.paginate'), 'DESC');

        return view('admin.pages.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->listAll();
        $tags = $this->tagsRepository->listAll();

        return view('admin.pages.article.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validation::validationArticle($request);
        $param = $request->all();
        if ($param['status'] == 1) {
            $param['time_public'] = Carbon::now();
        } else {
            $param['time_public'] = null;
        }
        $article = $this->articleRepository->create($param);
        if (!$article) {
            return redirect()->back()->with('status', config('const.add.failed'));
        }
        // add tags
        $assignTags = $this->articleRepository->assignTags($param['tags'], $article);
        if ($assignTags) {
            return redirect('/admin/article')->with('status', config('langVN.add.success'));
        }

        return redirect()->back()->with('status', config('const.add.failed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @param  int $id of article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, $id)
    {
        $categories = $this->categoryRepository->listAll();
        $tags = $this->tagsRepository->listAll();
        $article = $this->articleRepository->find($id);
        $assignTags = $this->articleRepository->getAssignTags($article);

        return view('admin.pages.article.edit', compact('categories', 'tags', 'article', 'assignTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id of article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validation::validationArticle($request);
        $param = $request->all();
        $checkArticle = $this->articleRepository->find($id);
        if (!$checkArticle) {
            return redirect('/admin/article')->with('status', config('langVN.data_not_found'));
        }
        if ($param['status'] == 1) {
            $param['time_public'] = Carbon::now();
        } else {
            $param['time_public'] = null;
        }
        $article = $this->articleRepository->update($param, $id);
        if (!$article) {
            return redirect()->back()->with('status', config('const.add.failed'));
        }
        // remove all tags
        $this->articleRepository->removeAssignTags($checkArticle);
        // add tags
        $assignTags = $this->articleRepository->assignTags($param['tags'], $checkArticle);
        if ($assignTags) {
            return redirect('/admin/article/' . $id . '/edit')->with('status', config('langVN.update.success'));
        }

        return redirect()->back()->with('status', config('const.update.failed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id of article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = $this->articleRepository->find($id);
        if (!$article) {
            return redirect('/admin/article')->with('status', config('langVN.data_not_found'));
        }
        // remove assign tags
        $this->articleRepository->removeAssignTags($article);
        $delete = $this->articleRepository->delete($id);
        if ($delete) {
            return redirect('/admin/article')->with('status', config('langVN.delete.success'));
        }

        return redirect('/admin/article')->with('status', config('langVN.delete.failed'));
    }

    /**
     * Controller search function
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $param = $request->all();
        $articles = $this->articleRepository->search($param);

        return view('admin.pages.article.index', compact('articles'));
    }
}
