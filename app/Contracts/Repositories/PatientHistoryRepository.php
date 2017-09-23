<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface PatientHistoryRepository extends AbstractRepository
{
    public function create($data = []);

    public function findByUserId($id, $select = ['*'], $with = []);

}
