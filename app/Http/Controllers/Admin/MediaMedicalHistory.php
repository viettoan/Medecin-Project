<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Contracts\Repositories\PatientRepository;
use App\Eloquent\User;
use Video;
use App\Eloquent\MedicalHistory;
use Anchu\Ftp\Facades\Ftp;
class MediaMedicalHistory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $video = new Video();
        $history = $video->saveHistory($request);
        if($video->saveMedia($history, $request)) {
            return redirect()->route('patient.index')->with('message',"Thêm thành công");
        }
        $history->delete();
        return redirect()->route('patient.index')->with('danger',"Video không hợp lệ");
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
        $history = MedicalHistory::findorFail($id);
        $media = $history->media;
        if(Video::update($request->video, $media)) {
          $history->content = $request->content ? $request->content : '';
          $history->save();
          return back()->with(['success' => 'Cập nhật thành công']);
        }

        return back()->withErrors('Video không hợp lệ.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history = MedicalHistory::findorFail($id);
        if(Video::destroy($history)) {
          return back()->with(['success' => 'Xóa thành công']);
        }

      return back()->withErrors('Xóa không thành công');
    }
}
