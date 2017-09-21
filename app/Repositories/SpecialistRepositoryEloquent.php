<?php

namespace App\Repositories;

use App\Contracts\Repositories\SpesicalRepository;
use App\Eloquent\Specialist;

class SpecialistRepositoryEloquent extends AbstractRepositoryEloquent implements SpesicalRepository
{
    public function model()
    {
        return new Specialist;
    }

    public function find($id, $select = ['*'], $with = [])
    {
        return $this->model()->select($select)->with($with)->find($id);
    }

    public function getAllUser($paginate)
    {
        return $this->model()->paginate($paginate);
    }

    public function getAll() 
    {
        return $this->model()->get();
    }

}
