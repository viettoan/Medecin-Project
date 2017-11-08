<?php

namespace App\Repositories;

use App\Contracts\Repositories\PatientRepository;
use App\Eloquent\User;

class PatientRepositoryEloquent extends AbstractRepositoryEloquent implements PatientRepository
{
    public function model()
    {
        return new User;
    }

    public function create($data = [])
    {
        $user = $this->model()->fill($data);
        $user->save();

        return $user;
    }

    public function find($id, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->find($id);
    }
    
    public function findByPhone($phone)
    {
        return $this->model()->where('phone', $phone)->first();
    }

    public function getAllPatient($with = [], $select = ['*'])
    {
        return $this->model()->select($select)->where('permission', config('custom.patient'))->with($with)->orderBy('id', 'DESC')->get();
    }

    public function searchByName($keyword, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->where('permission', config('custom.patient'))->where('name', 'like', "%".$keyword."%")->orWhere('phone', 'like', "%".$keyword."%")->with($with)->get();
    }
}
