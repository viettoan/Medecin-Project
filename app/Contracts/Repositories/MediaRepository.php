<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface MediaRepository extends AbstractRepository
{

    public function create($data = []);

    public function find($id, $select = ['*'], $with = []);

    public function getAll($with = [], $select = ['*']);

	public function getSLidersIndex($with = [], $select = ['*']);

	public function getVideoIntro($with = [], $select = ['*']);
}
