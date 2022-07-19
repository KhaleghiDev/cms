<?php

namespace Modules\Blog\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $category = Category::all();
        if ($keyword = request('search')) {
            $category->where('title', 'LIKE', "%{$keyword}%")
                ->orwhere('post', 'LIKE', "%{$keyword}%");
        }
        if ($paginate = request('paginate')) {
            $category = $category->paginate($paginate);
        }
        return $category;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $category=Category::findOrFild($id);
        $post=Post::where('catygory_id',$id)->get();
        return [
            'category'=>$category,
            'post'=>$post,
            'ststus'=>true
        ];
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    public function category_post($id){
        $post=Post::findOrFild($id);
        return $post;
    }
}
