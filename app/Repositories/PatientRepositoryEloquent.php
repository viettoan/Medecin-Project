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

    public function getAllPatient($paginate)
    {
        return $this->model()->where('permission', config('custom.patient'))->paginate($paginate);
    }

}
