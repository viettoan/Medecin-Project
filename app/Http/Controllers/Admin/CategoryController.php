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
        $manageCategories = $this->category->getAllPaginate(['parentCategories'], 10);
        return view('admin.categories.index', compact('manageCategories'));
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
            return back()->with('success', trans('message.category_success'));
        } else {
            return back()->with('failed', trans('message.category_failed'));
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
        $categoryEdit = $this->category->find($id, []);

        $parents = $this->category->getAll([]);
        return view('admin.categories.edit', compact('categoryEdit', 'parents'));
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
            return back()->with('success', trans('message.update_success'));
        } else {
            return back()->with('failed', trans('message.update_failed'));
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
