<?php

namespace App\Repositories;

use App\Contracts\Repositories\DoctorCalendarRepository;
use App\Eloquent\DoctorCalender;

class DoctorCalendarRepositoryEloquent extends AbstractRepositoryEloquent implements DoctorCalendarRepository
{
    public function model()
    {
        return new DoctorCalender;
    }

    public function find($id, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->find($id);
    }
    
    public function create($data = [])
    {
        $calendar = $this->model()->fill($data);
        $calendar->save();

        return $calendar;
    }

    public function getAll($with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->get();
    }
}
