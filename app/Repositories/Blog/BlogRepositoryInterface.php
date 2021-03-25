<?php

namespace App\Repositories\Blog;

interface BlogRepositoryInterface
{
    /**
     * @param $tags
     * @param $blog
     * @return mixed
     */
    public function assignTags($tags, $blog);

    /**
     * @param $blog
     * @return mixed
     */
    public function removeAssignTags($blog);

    /**
     * @param $blog
     * @return mixed
     */
    public function getAssignTags($blog);

    public function search($param);
}
