<?php

namespace App\Repositories\Tags;

interface TagsRepositoryInterface
{
    /**
     * @param object $tags
     * @return mixed
     */
    public function deleteTagsAssign($tags);
}
