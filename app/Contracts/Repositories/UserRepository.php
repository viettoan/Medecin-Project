<?php

namespace App\Contracts\Repositories;

interface UserRepository extends AbstractRepository
{

    public function create($data);

    public function find($id, $select = ['*'], $with = []);

    public function findByPhone($phone);

}
