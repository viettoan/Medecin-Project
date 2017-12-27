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
        return $this->model()->where('status', $status)->paginate(5);
    }

    public function getAllOrderBy($id, $status) 
    {
        return $this->model()->where('status', $status)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(5)->get();
    }

    public function updateSpecial($id, $data = [])
    {
        if ($a = $this->find($id, [], ['id'])) {
            return $a->update($data);
        }

        return false;
    }

}
