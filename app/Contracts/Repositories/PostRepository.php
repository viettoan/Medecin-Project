<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface PostRepository extends AbstractRepository
{
    public function create($data = []);

    public function find($id, $select = ['*'], $with = []);

    public function findPost($keyword, $select = ['*'], $with = []);

    public function getAllPost($paginate);

    public function getAllPostNew();

    public function getNewestPost($with = [], $select = ['*']);

    public function getPostByCategory($category_id, $paginate, $with = [], $select = ['*']);

    public function search($keyword, $with = [], $select = ['*']);

    public function getAbout($with = [], $select = ['*']);
}
