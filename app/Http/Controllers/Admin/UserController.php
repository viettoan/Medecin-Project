<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\ContactRepository;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\UpdatePassRequest;
use App\Eloquent\User;
use App\Eloquent\Post;
use App\Eloquent\Media;
use Charts;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected $user;

    public function __construct(UserRepository $user, PostRepository $post, ContactRepository $contact) {
        $this->user = $user;
        $this->post = $post;
        $this->contact = $contact;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $userList = $this->user->getAllUser('1', '2', '3','10');
            $response = [
                'pagination' => [
                    'total'        => $userList->total(),
                    'per_page'     => $userList->perPage(),
                    'current_page' => $userList->currentPage(),
                    'last_page'    => $userList->lastPage(),
                    'from'         => $userList->firstItem(),
                    'to'           => $userList->lastItem()
                ],
                'data' => $userList
            ];

            return response()->json($response);
        }
        return view('admin.users.index');
    }

    public function home ()
    {

        $countUser = count($this->user->getAllUserNew());

        $countPost = count($this->post->getAllPostNew());

        $countContact = count($this->contact->getAll());

        $chartUser = Charts::database(User::all(), 'bar', 'highcharts')
            ->title(trans('Users'))
            ->elementLabel(trans('Total'))
            ->dimensions(800, 500)
            ->responsive(true)
            ->groupBy('permission', null, [
                0 => trans('message.patient'),
                1 => trans('message.admin'),
                2 => trans('message.doctor'),
                3 => trans('message.disable')
            ]);

        $chartMedia = Charts::database(Media::all(), 'bar', 'highcharts')
            ->title(trans('Media'))
            ->elementLabel(trans('Total'))
            ->dimensions(800, 500)
            ->responsive(true)
            ->groupBy('status', null, [
                0 => trans('message.videos_patient'),
                1 => trans('message.slide_hide'),
                2 => trans('message.slide_show'),
                3 => trans('message.vides_intro_show'),
                4 => trans('message.vides_intro_hide'),
            ]);

        return view('admin._section.home',['chartUser' => $chartUser, 'chartMedia' => $chartMedia, 'countUser' => $countUser, 'countPost' => $countPost, 'countContact' => $countContact]);
    }

    public function search(Request $request) 
    {   
        $response = $this->user->searchUser($request->all()[0]);

        return response()->json($response);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.users.add');
    }

    public function changePass(UpdatePassRequest $request, $id)
    {
        $data = $request->except('confirm_password');

        if ($this->user->update($id, $data)) {
            $response['status'] = 'success';
            $response['message'] = trans('message.update_success');
            $response['action'] = trans('message.success');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('admin.error_happen');
            $response['action'] = trans('admin.error');
        }

        return response()->json($response);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->except('password');

        if ($this->user->create($data)) {
            $response['status'] = 'Thanh Cong ';
            $response['message'] = trans('Them Nguoi Dung Thanh Cong');
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
        $find = $this->user->find($id);

        return response()->json($find);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit');
    }

    /**
     * Update the specified resource in storage.
     *tran van my 
     *24/09/2016
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {

        $user = $this->user->update($id, $request->all());
        if ($user) {
            $response['status'] = 'success';
            $response['message'] = trans('message.edit_success');
            $response['action'] = trans('message.success');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('admin.error_happen');
            $response['action'] = trans('admin.error');
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *tran van my 
     *24-09-2017
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = $this->user->find($id, []);

            $user->delete();
            $message = trans('delete_success');
            return Response::json($message, 200);
        } catch (Exception $e ) {
            $message = trans('delete_failed');
            return Response::json($message, 403);
        }
    }
}
