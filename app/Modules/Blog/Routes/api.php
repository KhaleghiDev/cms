<?php

use Illuminate\Http\Request;
use Modules\Blog\Http\Controllers\Api\v1\CategoryController;
use Modules\Blog\Http\Controllers\Api\v1\PostsController;
use Modules\Blog\Http\Controllers\Api\v1\TagController;

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
Route::prefix('v1')->namespace('Api\v1')->group(function () {
    Route::apiResource('categories', '\CategoryController');
    Route::apiResource('tsages', '\TagController');
    Route::apiResource('postes', '\PostsController');
});


// Route::apiResource(['categories' => CategoryController::class]);

