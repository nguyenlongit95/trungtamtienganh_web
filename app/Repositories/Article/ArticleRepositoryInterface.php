<?php

namespace App\Repositories\Article;

interface ArticleRepositoryInterface
{
    /**
     * @param array $tags list id of tags selected
     * @param object $article
     * @return mixed
     */
    public function assignTags($tags, $article);

    /**
     * @param object $article
     * @return mixed
     */
    public function removeAssignTags($article);

    /**
     * @param $article
     * @return mixed
     */
    public function getAssignTags($article);

    /**
     * @param array $param condition search
     * @return mixed
     */
    public function search($param);
}
