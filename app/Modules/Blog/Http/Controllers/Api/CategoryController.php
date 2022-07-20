<?php

namespace Modules\Blog\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Transformers\CategoryResource;
use Modules\Blog\Transformers\PostResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $category = Category::all();
        // dd($category);
        if ($keyword = request('search')) {
            $category->where('title', 'LIKE', "%{$keyword}%")
                ->orwhere('post', 'LIKE', "%{$keyword}%");
        }
        if ($paginate = request('paginate')) {
            $category = $category->paginate($paginate);
        }
        return response()->json([
            'category' => CategoryResource::collection($category),
            'status' => true,
        ], 200);
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
            'icon' => 'string|150',
            'parintid' => '',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $category = Category::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'icon' => $request->icon,
            'parintid' => $request->parintid,
        ]);

        return response()->json(['دسته بندی با موفقیت ایجاد شد', new CategoryResource($category)]);
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {


        $category = Category::find($id);
        $post = Post::where('category_id', $category->id)->get();
        if (is_null($category)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([
            'category' =>   new CategoryResource($category),
            'post' => $post,
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
        $category =Category::findOrfild($id)->first();
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'icon' => 'string|150',
            'parintid' => '',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $category = $category->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'icon' => $request->icon,
            'parintid' => $request->parintid,
        ]);

        return response()->json(['دسته بندی با موفقیت ایجاد شد', new CategoryResource($category)]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int Category $categry
     * @return Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return [
            'massage' => "دسته بندی با موفقیت حذف شد",
            'status' => true,
        ];
    }
}
