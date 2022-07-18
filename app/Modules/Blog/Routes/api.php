<?php

use Illuminate\Http\Request;
use Modules\Blog\Http\Controllers\PostsController;

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
Route::apiResource('user', UserController::class);('/post','PostsController');
// Route::middleware('auth:api')->get('/blog', function (Request $request) {
//     return $request->user();
// });
