<?php

namespace App\Repositories;

use App\Contracts\Repositories\MediaRepository;
use App\Eloquent\Media;

class MediaRepositoryEloquent extends AbstractRepositoryEloquent implements MediaRepository
{
    public function model()
    {
        return new Media;
    }


    public function create($data = [])
    {
        $media = $this->model()->fill($data);
        $media->save();

        return $media;
    }

    public function find($id, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->find($id);
    }

    public function getAll($with = [], $paginate, $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->paginate($paginate);
    }

    public function getSLidersIndex($number = 3, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->where('status', config('custom.media.sliders.show'))->orderBy('created_at', 'desc')->with($with)->limit($number)->get();
    }

    public function getVideoIntro($with = [], $select = ['*'])
    {
        return $this->model()->select($select)->where('status', config('custom.media.video_intro.show'))->orderBy('created_at', 'desc')->with($with)->first();
    }
}
