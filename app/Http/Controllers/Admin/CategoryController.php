<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\CategoryRepository;
use Response;

class CategoryController extends Controller
{
    protected $category;

    /**
     * Pham Viet Toan
     * 09/25/2017
     * 
     * Construct function
     * @param App\Contracts\Repositories\CategoryRepository $category
     */
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
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
        $categories = $this->category->getAll(['parentCategories']);
        
        return Response::json($categories, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = $this->category->getAll([]);
        return view('admin.categories.add', compact('parents'));
    }

    /**
     * Pham Viet Toan
     * 09/25/2017
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        if ($this->category->create($data)) {
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
        $category = $this->category->find($id, []);
        return Response::json($category, 200);
    }

    /**
     * Pham Viet Toan
     * 09/25/2017
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->category->find($id, []);
        $data = $request->all();

        if ($category->update($data)) {
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
            $category = $this->category->find($id, []);

            $category->delete();
            $message = trans('category_success');

            return Response::json($message, 200);
        } catch (Exception $e ) {
            $message = trans('category_failed');
            
            return Response::json($message, 403);
        }
    }
}
