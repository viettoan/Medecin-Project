<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\SpesicalRepository;
use App\Eloquent\Specialist;
use App\Http\Requests\SpecialistRequest;
use App\Http\Requests\PostRequest;
use DB;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *tranvanmy
     *4-9-2017
     * @return \Illuminate\Http\Response
     */
    protected $specialist;

    public function __construct(SpesicalRepository $specialist) {
        $this->specialist = $specialist;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $listSpecial = $this->specialist->getAllUser('5');
            $response = [
                'pagination' => [
                    'total'        => $listSpecial->total(),
                    'per_page'     => $listSpecial->perPage(),
                    'current_page' => $listSpecial->currentPage(),
                    'last_page'    => $listSpecial->lastPage(),
                    'from'         => $listSpecial->firstItem(),
                    'to'           => $listSpecial->lastItem()
                ],
                'data' => $listSpecial
            ];

            return response()->json($response);
        }
        return view('admin.specialist.index');
    }

    public function list() 
    {
        $response = $this->specialist->getAll('1');

        return response()->json($response);
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
     *tranvanmy
     *4-9-2017
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->specialist->create($request->all())) {
            $response['status'] = 'Thanh Cong ';
            $response['message'] = trans('Them Chuyen Khoa Thanh Cong');
            $response['action'] = trans('Thanh Cong');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('admin.error_happen');
            $response['action'] = trans('admin.error');
        }

        return response()->json($response);
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
     *tranvanmy
     *4-9-2017
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('specialists')->where('id', $id)->update($request->all());
        // $user = $this->specialist->update($id, $request->all());
        // dd($user);
        // if ($user) {
        //     $response['status'] = 'success';
        //     $response['message'] = trans('message.edit_success');
        //     $response['action'] = trans('message.success');
        // } else {
        //     $response['status'] = 'error';
        //     $response['message'] = trans('admin.error_happen');
        //     $response['action'] = trans('admin.error');
        // }

        // return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     **tranvanmy
     *4-9-2017
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $specialist = $this->specialist->find($id, []);

            $specialist->delete();
            $message = trans('delete_success');
            return Response::json($message, 200);
        } catch (Exception $e ) {
            $message = trans('delete_failed');
            return Response::json($message, 403);
        }
    }
}
