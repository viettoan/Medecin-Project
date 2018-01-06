<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface RoomRepository extends AbstractRepository
{
    public function create($data = []);

    public function find($id, $select = ['*'], $with = []);

   	public function getRooms($with = [], $select = ['*']);
   	
   	public function getRoomsPagination($with = [], $select = ['*']);
}
