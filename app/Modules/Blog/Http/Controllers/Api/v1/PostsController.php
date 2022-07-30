<?php

namespace Modules\Blog\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Tag;
use Modules\Blog\Transformers\v1\PostResource;
use Modules\Blog\Transformers\v1\TagResource;

class PostsController extends Controller
{
   /**
     * @OA\Get(
     *      path="/v1/posts",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *     @OA\PathItem (
     * ath="/products/{product_id}",
     * @OA\Parameter(ref="#/components/parameters/product_id_in_path_required")
     *     ),
     * )
     */
    public function index()
    {
        $posts = Post::query()->with(["category","user"])->get();
    //    $category= $posts->category()->get();

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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'status' => '',
        ]);
        $tag = Tag::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status
        ]);

        return response()->json(['دسته بندی با موفقیت ایجاد شد', new TagResource($tag)]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::query()->where('id',$id)->with(["category","user"]);
        // dd($post);
        if (is_null($post)) {
            return response()->json('Data not found', 404);
        }
   
        dd( PostResource::collection($post));
        return response()->json([
            // 'post' => $post,
            'post' =>  PostResource::collection($post),
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'status' => '',
        ]);
        $tag = Tag::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status
        ]);
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
    public function count(Request $request ,Post $post){
        $post->update([
            'view'=>$request->view,
        ]);
        return response()->json([
            'ststus'=>true,
            'massage'=>""
        ]);
    }
}
