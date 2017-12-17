<?php

namespace App\Repositories;

use App\Contracts\Repositories\PatientHistoryRepository;
use App\Eloquent\MedicalHistory;

class PatientHistoryRepositoryEloquent extends AbstractRepositoryEloquent implements PatientHistoryRepository
{
    public function model()
    {
        return new MedicalHistory;
    }

    public function create($data = [])
    {
        $user = $this->model()->fill($data);
        $user->save();

        return $user;
    }

    public function findByUserId($id, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->where('user_id', $id)->with($with)->get();
    }
}
