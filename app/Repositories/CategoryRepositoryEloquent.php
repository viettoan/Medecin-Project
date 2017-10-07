<?php

namespace App\Repositories;

use App\Contracts\Repositories\CategoryRepository;
use App\Eloquent\Category;

class CategoryRepositoryEloquent extends AbstractRepositoryEloquent implements CategoryRepository
{
    public function model()
    {
        return new Category;
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

    public function getAllPaginate($status, $with = [], $paginate, $select = ['*'])
    {
        return $this->model()->select($select)->where('status', $status)->with($with)->paginate($paginate);
    }

    public function getAll($with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->get();
    }

    public function getAllRootCategories($with = [], $select = ['*'])
    {
        return $this->model()->select($select)->where('parent_id', config('custom.category.rootCategory'))
            ->where('status', config('custom.category.show'))
            ->with($with)->get();
    }

    public function search($keyword, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->where('name', 'like', "%$keyword%")->with($with)->get();
    }
}
