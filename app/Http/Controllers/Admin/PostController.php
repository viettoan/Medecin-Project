<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\CategoryRepository;
use App\Eloquent\Post;
use App\Http\Requests\PostRequest;
use Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $post;

    public function __construct(PostRepository $post, CategoryRepository $category) {
        $this->post = $post;
        $this->category = $category;
    }

    /**
     * Show list post.
     *Tran Van MY
     *30/09/2017
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if ($request->ajax()) {
        $postList = $this->post->getAllPost('10');
            $response = [
                'pagination' => [
                    'total'        => $postList->total(),
                    'per_page'     => $postList->perPage(),
                    'current_page' => $postList->currentPage(),
                    'last_page'    => $postList->lastPage(),
                    'from'         => $postList->firstItem(),
                    'to'           => $postList->lastItem()
                ],
                'data' => $postList
            ];

            return response()->json($response);
        }
        return view('admin.posts.index');
    }
     /**
     * Show list category.
     *Tran Van MY
     *30/09/2017
     * @return \Illuminate\Http\Response
     */
    public function getListCategory()
    {
        $categories = $this->category->getAllPaginate( 1,['parentCategories'], 10);

        return response()->json($categories);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.add');
    }

    /**
     * Store a newly created resource in storage.
     *Tran Van MY
     *30/09/2017
     *create post
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $exploded = explode(',', $request->image);

        $decoded = base64_decode($exploded[1]);

        if (str_contains($exploded[0], 'jpeg')) {
            $extention = 'jpg';
        } else {
            $extention = 'png';
        }

        $fileName = str_random().'.'.$extention;

        $path = public_path().'/images/post/'.$fileName;

        file_put_contents($path, $decoded);
        
        $data['image'] = '/images/post/'.$fileName;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['content'] = $request->content;
        $data['category_id'] = $request->category_id;
        $data['status'] = $request->status;

        if ($this->post->create($data)) {
            $response['status'] = 'success';
            $response['message'] = trans('message.addpost');
            $response['action'] = trans('message.success');
        } else {
            $response['status'] = 'error';
            $response['message'] = trans('message.error_happen');
            $response['action'] = trans('message.error');
        }

        return response()->json($response);
    }

    public function search(Request $request)
    {   
        $reponse = $this->post->search($request->all()[0]);

        return response()->json($reponse);
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
     **TRAN VAN MY
     *7-10-2017
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->find($id, []);
        $categories = $this->category->getAllPaginate( 1, ['parentCategories'], 10);
        
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *TRAN VAN MY
     *7-10-2017
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('image')) {
            $file = $request->file('image');
            if( ($file->getClientOriginalExtension('image') == "jpg") ||  ($file->getClientOriginalExtension('image') == "png")) {
                $fileName = $file->getClientOriginalName('image');
                $file->move('images/post', $fileName);
                 $data['image'] = '/images/post/'.$fileName;
                 $data['title'] = $request->title;
                 $data['description'] = $request->description;
                 $data['content'] = $request->content;
                 $data['category_id'] = $request->category_id;
                 $data['status'] = $request->status;

                if ($this->post->update($id ,$data)) {
                    session()->flash('message', trans('message.update_success'));
                    return back();
                } else {
                    session()->flash('message', trans('message.update_error'));
                    return back();
                }
            } else {
                session()->flash('message', trans('message.not_image'));
                return back();
            }
        } else {
                $data['title'] = $request->title;
                $data['description'] = $request->description;
                $data['content'] = $request->content;
                $data['category_id'] = $request->category_id;
                $data['status'] = $request->status;

                if ($this->post->update($id ,$data)) {
                    session()->flash('message', trans('message.update_success'));
                return back();
            }
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
            $post = $this->post->find($id, []);

            $post->delete();
            $response = trans('delete_success');

            return response()->json($response);
        } catch (Exception $e ) {
            $response = trans('delete_failed');

            return response()->json($response);
        }
    }
}
