<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Validations\Validation;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $this->categoryRepository->getAll(config('const.paginate'), 'DESC');

        return view('admin.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validation::validationCategory($request);
        $param = $request->all();
        $create = $this->categoryRepository->create($param);
        if (empty($create)) {
            return redirect()->back()->with('status', config('langVN.create.failed'));
        }

        return redirect('/admin/category')->with('status', config('langVN.create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @param  int $id of category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $category = $this->categoryRepository->find($id);
        if (empty($category)) {
            return redirect('/admin/category')->with('status', config('langVN.data_not_found'));
        }

        return view('admin.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @param  int $id of category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        Validation::validationCategory($request);
        $category = $this->categoryRepository->find($id);
        if (!$category) {
            return redirect('/admin/category')->with('status', config('langVN.data_not_found'));
        }

        $param = $request->all();
        $update = $this->categoryRepository->update($param, $id);
        if (!$update) {
            return redirect()->back()->with('status', config('langVN.update.failed'));
        }

        return redirect('/admin/category')->with('status', config('langVN.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @param  int $id of category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $category = $this->categoryRepository->find($id);
        if (!$category) {
            return redirect('/admin/category')->with('status', config('langVN.data_not_found'));
        }
        // Check data dependent
        $checkDependentData = $this->categoryRepository->checkDataDependent($category);
        if ($checkDependentData === false) {
            return redirect('/admin/category')->with('status', config('langVN.delete.cross_data'));
        }
        // Delete record
        $delete = $this->categoryRepository->delete($id);
        if (!$delete) {
            return redirect('/admin/category')->with('status', config('langVN.delete.failed'));
        }

        return redirect('/admin/category')->with('status', config('langVN.delete.success'));
    }

    /**
     * Search record category using name of category
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $param = $request->all();
        $categories = $this->categoryRepository->search($param);

        return view('admin.pages.category.index', compact('categories'));
    }
}
