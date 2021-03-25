<?php

namespace App\Validations;

class Validation
{
    /**
     * validation function for category
     *
     * @param $request
     */
    public static function validationCategory($request)
    {
        $request->validate([
            'name' => 'required',
            'sort' => 'required'
        ], [
            'name.required' => config('langVN.validation.category.name.required'),
            'sort.required' => config('langVN.validation.category.sort.required'),
        ]);
    }

    /**
     * Validate function for Articles
     *
     * @param $request
     */
    public static function validationArticle($request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'info' => 'required',
            'description' => 'required',
            'author' => 'required',
            'status' => 'required',
        ], [
            'name.required' => config('langVN.validation.article.name.required'),
            'category_id.required' => config('langVN.validation.article.category_id.required'),
            'title.required' => config('langVN.validation.article.title.required'),
            'info.required' => config('langVN.validation.article.info.required'),
            'description.required' => config('langVN.validation.article.description.required'),
            'author.required' => config('langVN.validation.article.author.required'),
            'status.required' => config('langVN.validation.article.status.required'),
        ]);
    }

    /**
     * Validation function for Blog
     *
     * @param $request
     */
    public static function validationBlog($request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'info' => 'required',
            'description' => 'required',
            'author' => 'required',
            'status' => 'required',
        ], [
            'name.required' => config('langVN.validation.article.name.required'),
            'title.required' => config('langVN.validation.article.title.required'),
            'info.required' => config('langVN.validation.article.info.required'),
            'description.required' => config('langVN.validation.article.description.required'),
            'author.required' => config('langVN.validation.article.author.required'),
            'status.required' => config('langVN.validation.article.status.required'),
        ]);
    }

    /**
     * Validate function tags
     *
     * @param $request
     */
    public static function validationTag($request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.require' =>  config('langVN.validation.tags.name.required'),
        ]);
    }
}
