<?php

namespace App\Repositories;

use App\Contracts\Repositories\PostRepository;
use App\Eloquent\User;

class PostRepositoryEloquent extends AbstractRepositoryEloquent implements PostRepository
{
    public function model()
    {
        return new User;
    }

    public function create($data = [])
    {
        $user = $this->model()->fill($data);
        $user->save();

        return $user;
    }

    public function find($id, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->find($id);
    }

}
