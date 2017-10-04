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


    public function create($data = [])
    {
        $contact = $this->model()->fill($data);
        $contact->save();

        return $contact;
    }

    public function find($id, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->find($id);
    }

    public function getAll($with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->orderBy('created_at', 'desc')->get();
    }

}
