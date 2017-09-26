<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface CategoryRepository extends AbstractRepository
{

    public function create($data = []);

    public function find($id, $select = ['*'], $with = []);

    public function getAllPaginate($with = [], $paginate, $select = ['*']);

    public function getAll($with = [], $select = ['*']);

}
