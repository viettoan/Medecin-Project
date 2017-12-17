<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\MediaRepository;
use UploadFile;
use Response;
use File;

class VideoController extends Controller
{
    protected $media;

    public function __construct(MediaRepository $media)
    {
        $this->media = $media;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.media.videos');
    }

    public function list()
    {
        $videos = $this->media->getAll([]);

        foreach ($videos as $value) {
            $value->path = asset(config('custom.media.video_intro.defaultPath') . $value->path);
        }
        return Response::json($videos, 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = [];
        $rule = [
            'video'  => 'mimes:mp4,mov,ogg,avi | max:200000'
        ];

        $validator = \Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            foreach ($rule as $key => $value) {
                if ($validator->messages()->first($key)) {
                    $response[] = $validator->messages()->first($key);
                }
            }

            return \Response::json($response, 403);
        }
        $video = $request->file('video');
        $filename = $video->hashName();
        $video->move(config('custom.media.video_intro.defaultPath'), $filename);

        $data = [
            'name' => $filename,
            'medical_history_id' => 0,
            'type' => 'video',
            'status' => $request->status,
            'path' => $filename,
        ];

        if ($this->media->create($data)) {
            return Response::json(trans('message.create_success'), 200);
        } else {
            return Response::json(trans('message.create_failed'), 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $media = $this->media->find($id, []);

        if($media->status == config('custom.media.video_intro.hide') ) {
            $status = config('custom.media.video_intro.show');
        } else {
            $status = config('custom.media.video_intro.hide');
        }

        $data = [
            'status' => $status,
        ];
        if ($media->update($data)) {
            return Response::json(trans('message.update_success'), 200);
        } else {
            return Response::json(trans('message.update_failed'), 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $video = $this->media->find($id, []);
            $video_path = config('custom.media.video_intro.defaultPath') . $video->path;

            if (File::exists($video_path)) {
                //File::delete($image_path);
                unlink($video_path);
            }
            $video->delete();
            $message = trans('delete_success');
            return Response::json($message, 200);
        } catch (Exception $e ) {
            $message = trans('delete_failed');
            return Response::json($message, 403);
        }  
    }
}
