<?php

namespace Modules\Blog\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Blog\Entities\Tag;
use Modules\Blog\Transformers\v1\TagResource;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $tag = Tag::all();
        // dd($category);
        if ($keyword = request('search')) {
            $tag->where('title', 'LIKE', "%{$keyword}%")
                ->orwhere('post', 'LIKE', "%{$keyword}%");
        }
        if ($paginate = request('paginate')) {
            $category = $tag->paginate($paginate);
        }
        return response()->json([
            'category' => TagResource::collection($tag),
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
            'status' =>'',
        ]);
        $tag = Tag::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status,
        ]);
        return response()->json(['تگ با موفقیت ایجاد شد', new TagResource($tag)]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $category = Tag::find($id)->first();
        if (is_null($category)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([
            'tag' =>   new TagResource($category),
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
            'status' => 'string|150',
        ]);
        $tag = Tag::update([
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->icon
        ]);
        return response()->json(['تگ با موفقیت ایجاد شد', new TagResource($tag)]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return [
            'massage' => "تگ با موفقیت حذف شد",
            'status' => true,
        ];
    }
}
