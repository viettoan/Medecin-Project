<?php

namespace App\Repositories;

use App\Contracts\Repositories\PostRepository;
use App\Eloquent\Post;

class PostRepositoryEloquent extends AbstractRepositoryEloquent implements PostRepository
{
    public function model()
    {
        return new Post;
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

    public function getAllPost($paginate)
    {
        return $this->model()->orderBy('id', 'DESC')->paginate($paginate);
    }

    public function getNewestPost($number = 3, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->where('status', config('custom.post.show'))->orderBy('created_at', 'desc')->with($with)->limit($number)->get();
    }

    public function getPostByCategory($category_id, $paginate, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)
            ->where('category_id', $category_id)
            ->where('status', config('custom.post.show'))
            ->orderBy('created_at', 'desc')
            ->with($with)
            ->paginate($paginate);
    }

    public function search($keyword, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->where('title', 'like', "%$keyword%")->with($with)->get();
    }
}