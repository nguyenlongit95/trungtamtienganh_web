<?php

namespace App\Repositories\Tags;

use App\Models\Tags;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TagsEloquentRepository extends EloquentRepository implements TagsRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getModel()
    {
        return Tags::class;
    }

    /**
     * Function delete dependent of tags on table blog and articles
     *
     * @param object $tags
     * @return mixed
     */
    public function deleteTagsAssign($tags)
    {
        try {
            DB::beginTransaction();
            DB::table('article_tags')->where('tag_id', $tags->id)->delete();
            DB::table('blog_tags')->where('tag_id', $tags->id)->delete();
            DB::commit();

            return true;
        } catch (\Exception $exception) {
            Log::error($exception);
            DB::rollBack();
            return false;
        }
    }
}
