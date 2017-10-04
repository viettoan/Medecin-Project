<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface PatientRepository extends AbstractRepository
{
    public function create($data = []);

    public function find($id, $select = ['*'], $with = []);
    
    public function findByPhone($phone);

    public function getAllPatient($with = [], $select = ['*']);

}
