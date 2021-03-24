<?php

namespace App\Validations;

class Validation
{
    public static function validationCategory($request)
    {
        $request->validate([
            'name' => 'required',
            'sort' => 'required'
        ], [
            'name' => config('langVN.validation.category.name.required'),
            'sort' => config('langVN.validation.category.sort.required'),
        ]);
    }

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
            'name' => config('langVN.validation.article.name.required'),
            'category_id' => config('langVN.validation.article.category_id.required'),
            'title' => config('langVN.validation.article.title.required'),
            'info' => config('langVN.validation.article.info.required'),
            'description' => config('langVN.validation.article.description.required'),
            'author' => config('langVN.validation.article.author.required'),
            'status' => config('langVN.validation.article.status.required'),
        ]);
    }
}
