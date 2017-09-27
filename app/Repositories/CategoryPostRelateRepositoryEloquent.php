<?php

namespace App\Repositories;

use App\Contracts\Repositories\CategoryPostRelateRepository;
use App\Eloquent\CategoryPostRelate;

class CategoryPostRelateRepositoryEloquent extends AbstractRepositoryEloquent implements CategoryPostRelateRepository
{
    public function model()
    {
        return new CategoryPostRelate;
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

    public function getPostByCategory($paginate = 10, $category_id, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)
            ->where('category_id', $category_id)
            ->with('post')
            ->orderBy('created_at', 'desc')
            ->paginate($paginate);
    }
}
