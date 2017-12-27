<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\PatientRepository;
use Response;
use App\Helpers\Helper;
use Carbon;

class PatientController extends Controller
{
    protected $patient;

    /**
     * Pham Viet Toan
     * 09/20/2017
     * Construct function.
     *
     */
    public function __construct(
        PatientRepository $patient
    ) {
        $this->patient = $patient;
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
        return view('admin.patients.index');
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
        $patients = $this->patient->getAllPatient([]);
        
        return Response::json($patients, 200);
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
     * @param  App\Http\Request\PatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        $data = $request->all();
        $data['permission'] = config('custom.patient');
        $data['password'] = $data['phone'];

        $dateTime = Carbon\Carbon::now()->toDateTimeString();
        $dateTimeFormated = str_replace(['-', ' ', ':'], ['', '_', ''], $dateTime);

        if (!$data['email']) {
            $data['email'] = $dateTimeFormated;
        }

        $findPhone = $this->patient->findByPhone($data['phone']);
        if($findPhone == NULL) {
            if ($this->patient->create($data)) {
                $response['status'] = 'success';
                $response['message'] = trans('message.update_success');
                $response['action'] = trans('message.success');
            } else {
                $response['status'] = 'error';
                $response['message'] = trans('admin.error_happen');
                $response['action'] = trans('admin.error');
            }
        } else {
            
                $response['name'] = $findPhone['name'];
                $response['email'] = $findPhone['email'];
                $response['status'] = 'unique';
                $response['message'] = 'Da dang ky so dien thoai nay!';
                $response['action'] = trans('admin.error');
            }

            return response()->json($response);
    }

    /**
     * Pham Viet Toan
     * 09/21/2017
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = $this->patient->find($id, []);

        return view('admin.patients.detail', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = $this->patient->find($id, []);
        return Response::json($patient, 200);
    }

    /**
     * Pham Viet Toan
     * 09/20/2017
     * Update the specified resource in storage.
     *
     * @param  App\Http\Request\PatientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, $id)
    {
        $data = $request->all();
        unset($data['id']);
        $data['password'] =$data['phone'];
        $patient = $this->patient->find($id, []);
        if ($patient->update($data)) {
            return Response::json(trans('message.update_success'), 200);
        } else {
            return Response::json(trans('message.update_failed'), 403);
        }
    }

    /**
     * Pham Viet Toan
     * 09/20/2017
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $patient = $this->patient->find($id, []);

            $patient->delete();
            $message = trans('delete_success');
            return Response::json($message, 200);
        } catch (Exception $e ) {
            $message = trans('delete_failed');
            return Response::json($message, 403);
        }  
    }

    /**
     * Pham Viet Toan
     * 10/08/2017
     * Search patient by name
     * @return Response
     */
    public function search(Request $request)
    {
        $keyword = $request->name;
        $keyword = Helper::handleSearchkeyword($keyword);

        $patients = $this->patient->searchByName($keyword, []);

        return Response::json($patients, 200);
    } 
}
