<?php

namespace App\Repositories\Tags;

use App\Models\Tags;
use App\Repositories\Eloquent\EloquentRepository;

class TagsEloquentRepository extends EloquentRepository implements TagsRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getModel()
    {
        return Tags::class;
    }
}
