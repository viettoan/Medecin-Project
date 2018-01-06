<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface DoctorCalendarRepository extends AbstractRepository
{
    public function create($data = []);

    public function find($id, $select = ['*'], $with = []);

    public function getByRoomId($id, $with = [], $select = ['*']);

    public function getAll($with = [], $select = ['*']);
}
