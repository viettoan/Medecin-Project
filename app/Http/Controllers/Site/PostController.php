<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\CategoryRepository;

class PostController extends Controller
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
        CategoryRepository $category
    )
    {
        $this->category = $category;
        $this->post = $post;
    }

    /**
     * Pham Viet Toan
     * 09/30/2017
     * Display a listing of the resource.
     *
     * @param  int  $category_id
     * @param string $category
     * @return \Illuminate\Http\Response
     */
    public function index($category, $category_id)
    {
        $posts = $this->post->getPostByCategory($category_id, 8, []);

        return view('sites.posts.index', compact('posts'));
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
