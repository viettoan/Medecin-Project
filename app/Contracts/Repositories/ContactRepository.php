<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface ContactRepository extends AbstractRepository
{
    public function find($id, $select = ['*'], $with = []);

    public function getAllContact($paginate);
}
