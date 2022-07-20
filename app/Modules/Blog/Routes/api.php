<?php

use Illuminate\Http\Request;
use Modules\Blog\Http\Controllers\Api\CategoryController;
use Modules\Blog\Http\Controllers\Api\PostsController;
use Modules\Blog\Http\Controllers\Api\TagController;

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
Route::apiResource('categories', 'Api\CategoryController');
Route::apiResource('tsages', 'Api\TagController');
Route::apiResource('postes', 'Api\PostsController');

// Route::apiResource(['categories' => CategoryController::class]);

