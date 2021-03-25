<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use App\Repositories\Tags\TagsRepositoryInterface;
use App\Validations\Validation;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    protected $tagsRepository;

    public function __construct(TagsRepositoryInterface $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->tagsRepository->getAll(config('const.paginate'), 'DESC');

        return view('admin.pages.tags.index', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validation::validationTag($request);
        $param = $request->all();
        $create = $this->tagsRepository->create($param);
        if ($create) {
            return redirect('/admin/tags')->with('status', config('langVN.add.success'));
        }

        return redirect('/admin/tags')->with('status', config('langVN.add.failed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id of tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validation::validationTag($request);
        $tags = $this->tagsRepository->find($id);
        if (empty($tags)) {
            return redirect('/admin/tags')->with('status', config('langVN.data_not_found'));
        }
        // update tags
        $param = $request->all();
        $update = $this->tagsRepository->update($param, $id);
        if ($update) {
            return redirect('/admin/tags')->with('status', config('langVN.add.success'));
        }

        return redirect('/admin/tags')->with('status', config('langVN.add.failed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tags  $tags
     * @param  int $id of tags
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tags $tags, $id)
    {
        $tags = $this->tagsRepository->find($id);
        if (empty($tags)) {
            return redirect('/admin/tags')->with('status', config('langVN.data_not_found'));
        }
        // delete dependent tags assign on blog and articles
        $deleteDependentTags = $this->tagsRepository->deleteTagsAssign($tags);
        if ($deleteDependentTags == false) {
            return redirect('/admin/tags')->with('status', config('langVN.delete.failed'));
        }
        // delete the tags
        $deleteTags = $this->tagsRepository->delete($id);
        if ($deleteTags == true) {
            return redirect('/admin/tags')->with('status', config('langVN.delete.success'));
        }

        return redirect('/admin/tags')->with('status', config('langVN.delete.failed'));
    }
}
