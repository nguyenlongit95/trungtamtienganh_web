<?php


namespace App\Repositories\Article;


use App\Models\Article;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ArticleEloquentRepository extends EloquentRepository implements ArticleRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Article::class;
    }

    /**
     * Function assign tags an articles
     *
     * @param array $tags list id of tags selected
     * @param object $article
     * @return mixed
     */
    public function assignTags($tags, $article)
    {
        try {
            if (is_array($tags)) {
                foreach ($tags as $tag) {
                    DB::table('article_tags')->insert([
                        'tag_id' => $tag,
                        'article_id' => $article->id
                    ]);
                }
            } else {
                DB::table('article_tags')->insert([
                    'tag_id' => $tags,
                    'article_id' => $article->id
                ]);
            }

            return true;
        } catch (\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    /**
     * Function delete tags assigned an article
     *
     * @param object $article
     * @return mixed
     */
    public function removeAssignTags($article)
    {
        try {
            return DB::table('article_tags')->where('article_id', $article->id)->delete();
        } catch (\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    /**
     * SQL function list all assigned tags of article
     *
     * @param object $article
     * @return mixed
     */
    public function getAssignTags($article)
    {
        return DB::table('article_tags')->where('article_id', $article->id)->pluck('tag_id')->toArray();
    }

    /**
     * SQL function search article using condition search in array param
     *
     * @param array $param condition search
     * @return mixed
     */
    public function search($param)
    {
        return Article::where(function ($query) use ($param) {
            if (isset($param['name'])) {
                $query->where('name', 'like', '%' . $param['name'] . '%');
            }
            if (isset($param['author'])) {
                $query->where('author', 'like', '%' . $param['author'] . '%');
            }
            if (isset($param['time_public'])) {
                $query->whereDate('time_public', $param['time_public']);
            }
        })->orderBy('id', 'DESC')->paginate(config('const.paginate'));
    }
}
