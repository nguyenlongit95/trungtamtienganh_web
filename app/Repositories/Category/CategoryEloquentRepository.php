<?php

namespace App\Repositories\Category;

use App\Models\Article;
use App\Models\Category;
use App\Repositories\Eloquent\EloquentRepository;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getModel()
    {
        return Category::class;
    }

    /**
     * Function check data dependent of category
     *
     * @param object $category of category
     * @return mixed
     */
    public function checkDataDependent($category)
    {
        $articles = Article::where('category_id', $category->id)->whereNull('deleted_at')->count();
        if ($articles > 0) {
            return false;
        }

        return true;
    }

    /**
     * @param array $param
     * @return mixed
     */
    public function search($param)
    {
        return Category::where('name', 'like', '%' . $param['name'] . '%')->orderBy('id', 'DESC')
            ->paginate(config('const.paginate'));

    }
}
