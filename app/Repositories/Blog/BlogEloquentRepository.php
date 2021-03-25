<?php

namespace App\Repositories\Blog;

use App\Models\Blog;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BlogEloquentRepository extends EloquentRepository implements BlogRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Blog::class;
    }

    /**
     * Function add new tags for blog
     *
     * @param array $tags list if of tags
     * @param object $blog
     * @return mixed
     */
    public function assignTags($tags, $blog)
    {
        try {
            if (is_array($tags)) {
                foreach ($tags as $tag) {
                    DB::table('blog_tags')->insert([
                        'tag_id' => $tag,
                        'blog_id' => $blog->id
                    ]);
                }
            } else {
                DB::table('blog_tags')->insert([
                    'tag_id' => $tags,
                    'blog_id' => $blog->id
                ]);
            }

            return true;
        } catch (\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    /**
     * Function delete all assign tags of blog
     *
     * @param object $blog
     * @return mixed
     */
    public function removeAssignTags($blog)
    {
        try {
            return DB::table('blog_tags')->where('blog_id', $blog->id)->delete();
        } catch (\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    /**
     * Function get all tags of blog
     *
     * @param object $blog
     * @return mixed
     */
    public function getAssignTags($blog)
    {
        return DB::table('blog_tags')->where('blog_id', $blog->id)->pluck('tag_id')->toArray();
    }

    /**
     * Function search blog using condition
     *
     * @param array $param
     * @return mixed
     */
    public function search($param)
    {
        return Blog::where(function ($query) use ($param) {
            if (isset($param['name'])) {
                $query->where('name', 'like', '%' . $param['name'] . '%');
            }
            if (isset($param['author'])) {
                $query->where('author', 'like', '%' . $param['author'] . '%');
            }
        })->orderBy('id', 'DESC')->paginate(config('const.paginate'));
    }
}
