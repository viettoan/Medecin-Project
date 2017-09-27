<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\CategoryPostRelateRepository;

class SpecialistController extends Controller
{
    protected $category;
    protected $post;
    protected $categoryPostRelate;

    /**
     * Pham Viet Toan
     * 09/27/2017
     *
     * Construct function
     * @param App\Contracts\Repositories\PostRepository $post
     * @param App\Contracts\Repositories\CategoryRepository $category
     * @param App\Contracts\Repositories\CategoryPostRelateRepository $categoryPostRelate
     */
    public function __construct(
        PostRepository $post,
        CategoryRepository $category,
        CategoryPostRelateRepository $categoryPostRelate
    )
    {
        $this->category = $category;
        $this->post = $post;
        $this->categoryPostRelate = $categoryPostRelate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryPostRelates = $this->categoryPostRelate->getPostByCategory(10, 6, 'post');
        foreach ($categoryPostRelates as $post) {
            $posts[] = $post->post;
        }

        return view('sites.chuyenkhoa.index', compact('posts', 'categoryPostRelates'));
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
        //
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
        //
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
