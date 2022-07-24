<?php

namespace Modules\Blog\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Post;
use Modules\Blog\Transformers\PostResource;

class PostsController extends Controller
{
    /**
     * @group   Post Group
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $posts = Post::all();
        if ($keyword = request('search')) {
            $posts->where('title', 'LIKE', "%{$keyword}%")
                ->orwhere('post', 'LIKE', "%{$keyword}%");
        }
        if ($paginate = request('paginate')) {
        $posts = $posts->paginate($paginate);
        }
        return $posts;
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
        $post = Post::find($id)->first();
        // dd($post);
        if (is_null($post)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([
            'post' =>$post,
            // new PostResource($post),
            // 'post' => PostResource::collection($post),
            'status' => true,
        ], 200);
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
    public function destroy(Post $post)
    {
        $post->delete();
        return [
            'massage' => " پست با موفقیت حذف شد",
            'status' => true,
        ];
    }
}
