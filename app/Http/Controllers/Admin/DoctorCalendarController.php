<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\DoctorCalendarRepository;
use App\Contracts\Repositories\UserRepository;
use Response;
use App\Helpers\Helper;

class DoctorCalendarController extends Controller
{
    protected $calendar, $doctor;

    /**
     * Pham Viet Toan
     * 09/20/2017
     * Construct function.
     *
     */
    public function __construct(
        DoctorCalendarRepository $calendar,
        UserRepository $doctor
    ) {
        $this->calendar = $calendar;
        $this->doctor = $doctor;
    }

    /**
     * Pham Viet Toan
     * 09/20/2017
     * Display a listing of the resource 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.doctor_calendars.index');
    }

    /**
     * Pham Viet Toan
     * 10/03/2017
     * Display a listing of the resource with ajax.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $calendars = $this->calendar->getAll(['doctor']);

        return Response::json($calendars, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = $this->doctor->getByPermission(config('custom.doctor'), []);
        
        return Response::json($doctors, 200);
    }

    /**
     * Pham Viet Toan
     * 09/25/2017
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($this->calendar->create($data)) {
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
     * Pham Viet Toan
     * 09/25/2017 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calendar = $this->calendar->find($id, ['doctor']);

        return Response::json($calendar, 200);
    }

    /**
     * Pham Viet Toan
     * 09/25/2017
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $calendar = $this->calendar->find($id, []);
        $data = $request->all();

        if ($calendar->update($data)) {
            return Response::json(trans('message.update_success'), 200);
        } else {
            return Response::json(trans('message.update_failed'), 403);
        }    
    }

    /**
     * Pham Viet Toan
     * 09/25/2017
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $calendar = $this->calendar->find($id, []);

            $calendar->delete();
            $message = trans('Delete_success');

            return Response::json($message, 200);
        } catch (Exception $e ) {
            $message = trans('Delete_failed');
            
            return Response::json($message, 403);
        }
    }
}
