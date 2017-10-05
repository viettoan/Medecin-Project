<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface ContactRepository extends AbstractRepository
{

    public function create($data = []);

    public function find($id, $select = ['*'], $with = []);

    public function getAll($with = [], $select = ['*']);

}
