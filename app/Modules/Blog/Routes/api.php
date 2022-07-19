<?php

use Illuminate\Http\Request;
use Modules\Blog\Http\Controllers\Api\CategoryController;
use Modules\Blog\Http\Controllers\Api\PostsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('post', [PostsController::class,'index']);
Route::apiResource('category', CategoryController::class);
Route::get('category/{id}/posts', [CategoryController::class,'category_post']);

