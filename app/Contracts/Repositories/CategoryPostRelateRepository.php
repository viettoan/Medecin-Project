<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface CategoryPostRelateRepository extends AbstractRepository
{

    public function create($data = []);

    public function find($id, $select = ['*'], $with = []);

    public function getPostByCategory($paginate = 10, $category_id, $with = [], $select = ['*']);

}
