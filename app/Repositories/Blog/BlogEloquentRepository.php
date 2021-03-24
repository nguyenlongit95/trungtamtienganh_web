<?php

namespace App\Repositories\Blog;

use App\Repositories\Eloquent\EloquentRepository;

class BlogEloquentRepository extends EloquentRepository implements BlogRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getModel()
    {
        // TODO: Implement getModel() method.
    }
}
