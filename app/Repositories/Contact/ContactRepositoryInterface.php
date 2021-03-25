<?php

namespace App\Repositories\Contact;

interface ContactRepositoryInterface
{
    /**
     * @param $param
     * @return mixed
     */
    public function search($param);
}
