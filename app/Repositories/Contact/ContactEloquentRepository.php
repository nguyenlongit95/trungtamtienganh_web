<?php

namespace App\Repositories\Contact;

use App\Models\Contact;
use App\Repositories\Eloquent\EloquentRepository;

class ContactEloquentRepository extends EloquentRepository implements ContactRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getModel()
    {
        return Contact::class;
    }

    /**
     * Function search contact
     *
     * @param array $param
     * @return mixed
     */
    public function search($param)
    {
        return Contact::where(function ($query) use ($param) {
            if (isset($param['name'])) {
                $query->where('name', 'like', '%' . $param['name'] . '%');
            }
            if (isset($param['email'])) {
                $query->where('email', 'like', '%' . $param['email'] . '%');
            }
        })->orderBy('id', 'DESC')->paginate(config('const.paginate'));
    }
}
