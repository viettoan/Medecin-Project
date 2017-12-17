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
        return $this->model()->orderBy('id', 'DESC')->paginate($paginate);
    }

    public function getAll($status) 
    {
        return $this->model()->where('status', $status)->get();
    }

    public function updateSpecial($id, $data = [])
    {
        if ($a = $this->find($id, [], ['id'])) {
            return $a->update($data);
        }

        return false;
    }

}
