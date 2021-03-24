<?php


namespace App\Repositories\Category;


interface CategoryRepositoryInterface
{
    /**
     * @param object $category of category
     * @return mixed
     */
    public function checkDataDependent($category);

    /**
     * @param array $param
     * @return mixed
     */
    public function search($param);
}
