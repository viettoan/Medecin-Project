<?php

namespace App\Repositories;

use App\Contracts\Repositories\RoomRepository;
use App\Eloquent\Room;

class RoomRepositoryEloquent extends AbstractRepositoryEloquent implements RoomRepository
{
    public function model()
    {
        return new Room;
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

    public function getRooms($with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->get();
    }

    public function getRoomsPagination($with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->orderBy('id', 'DESC')->paginate(10);

    }

}
