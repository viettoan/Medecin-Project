<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\MediaRepository;
use UploadFile;
use Response;
use File;

class SliderController extends Controller
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
        return view('admin.media.sliders');
    }

    public function list()
    {
        $sliders = $this->media->getAll([]);

        foreach ($sliders as $value) {
            $value->path = asset(config('custom.media.sliders.defaultPath') . $value->path);
        }
        return Response::json($sliders, 200);
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
            'image' => 'required|image',
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
        $image = $request->file('image');
        $filename = $image->hashName();
        $image->move(config('custom.media.sliders.defaultPath'), $filename);

        $data = [
            'name' => $filename,
            'medical_history_id' => 0,
            'type' => 'image',
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

        if($media->status == config('custom.media.sliders.hide') ) {
            $status = config('custom.media.sliders.show');
        } else {
            $status = config('custom.media.sliders.hide');
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
            $slider = $this->media->find($id, []);
            $image_path = config('custom.media.sliders.defaultPath') . $slider->path;

            if (File::exists($image_path)) {
                //File::delete($image_path);
                unlink($image_path);
            }
            $slider->delete();
            $message = trans('delete_success');
            return Response::json($message, 200);
        } catch (Exception $e ) {
            $message = trans('delete_failed');
            return Response::json($message, 403);
        }  
    }
}
