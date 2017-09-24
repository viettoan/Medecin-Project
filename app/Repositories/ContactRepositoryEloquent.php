<?php

namespace App\Repositories;

use App\Contracts\Repositories\ContactRepository;
use App\Eloquent\Contact;

class ContactRepositoryEloquent extends AbstractRepositoryEloquent implements ContactRepository
{
    public function model()
    {
        return new Contact;
    }

    public function find($id, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->find($id);
    }

    public function getAllContact($paginate)
    {
        return $this->model()->paginate($paginate);
    }

}
