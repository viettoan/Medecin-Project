<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UserRepository;

class PatientController extends Controller
{
    protected $user;

    /**
     * Pham Viet Toan
     * 09/20/2017
     * Construct function.
     *
     */
    public function __construct(
        UserRepository $user
    ) {
        $this->user = $user;
    }
    /**
     * Pham Viet Toan
     * 09/20/2017
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = $this->user->getAllUser(10);
        return view('admin.patients.index', compact('patients'));
    }

    /**
     * Pham Viet Toan
     * 09/20/2017
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patients.add');
    }

    /**
     * Pham Viet Toan
     * 09/20/2017
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Request\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['permission'] = 0;
        $data['password'] = $data['phone'];
        if ($this->user->create($data)) {
            return redirect()->route('patient.index');
        } else {
            return redirect()->route('patient.create')->with('message', __('message.create_failed'));
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
        return view('admin.patients.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = $this->user->find($id, []);
        return view('admin.patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        unset($data['id']);
        $data['password'] =$data['phone'];
        $patient = $this->user->find($id, []);
        if ($patient->update($data)) {
            return redirect()->route('patient.edit', $id)->with('success', trans('message.update_success'));
        } else {
            return redirect()->route('patient.edit', $id)->with('failed', trans('message.update_failed'));
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
        //
    }
}
