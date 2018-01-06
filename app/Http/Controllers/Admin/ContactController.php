<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\Repositories\ContactRepository;
use App\Contracts\Repositories\RoomRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomNewRequests;
use Response;

class ContactController extends Controller
{
    protected $contact;
    protected $room;

    /**
     * Pham Viet Toan
     * 09/24/2017
     *
     * Construct function
     */
    public function __construct(ContactRepository $contact, RoomRepository $room)
    {
        $this->contact = $contact;
        $this->room = $room;
    }

    /**
     * Pham Viet Toan
     * 09/24/2017
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.contacts.index');
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
        $contacts = $this->contact->getAll([]);
        
        return Response::json($contacts, 200);
    }

    public function search(Request $request) 
    {
        $response = $this->contact->search($request->all()[0]);

        return Response::json($response);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contacts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Pham Viet Toan
     * 09/24/2017
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->contact->find($id, []);

        return Response::json($contact, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.contacts.edit');
    }

    /**
     * Pham Viet Toan
     * 09/24/2017 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = $this->contact->find($id, []);
        $data = [
            'status' => config('custom.contact.accept')
        ];

        try {
            $contact->update($data);
            return Response('Contact Accepted!', 200);
        } catch (Exception $e) {
            return Response("Contact can't not accept!", 403);
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

    public function showRoom(Request $request) {
        if ($request->ajax()) {
            $roomList = $this->room->getRoomsPagination();
            $response = [
                'pagination' => [
                    'total'        => $roomList->total(),
                    'per_page'     => $roomList->perPage(),
                    'current_page' => $roomList->currentPage(),
                    'last_page'    => $roomList->lastPage(),
                    'from'         => $roomList->firstItem(),
                    'to'           => $roomList->lastItem()
                ],
                'data' => $roomList
            ];

            return response()->json($response);
        }
        return view('admin.phongban.index');
    }

    public function addRoom(RoomNewRequests $request) {
        $data['name'] =$request->name;
        if ($this->room->create($data)) {
            $response['status'] = 'Thành Công';
            $response['message'] = trans('Thêm Phòng Ban Thành Công');
            $response['action'] = trans('Thành Công');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('admin.error_happen');
            $response['action'] = trans('admin.error');
        }

        return response()->json($response);
    }

    public function deleteRoom($id) {
        try {
            $rooms = $this->room->find($id, []);

            $rooms->delete();
            $message = 'Xóa Phòng Ban Thành Công!';
            return Response::json($message, 200);
        } catch (Exception $e ) {
            $message = trans('delete_failed');
            return Response::json($message, 403);
        }
    }

    public function upRoom(Request $request, $id) {
        $room = $this->room->update($id, $request->all());
        if ($room) {
            $response['status'] = 'Sửa Phòng Ban Thành Công!';
            $response['message'] = trans('message.edit_success');
            $response['action'] = trans('message.success');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('admin.error_happen');
            $response['action'] = trans('admin.error');
        }

        return response()->json($response);
    }
}
