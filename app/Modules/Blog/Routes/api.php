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

    //router tag controller

    Route::get('/tages', 'TagController@index')->name('tag.all');
    Route::post('/tages', 'TagController@store')->name('tag.store');
    Route::get('/tages/{tag}', 'TagController@show')->name('tag.show');
    Route::put('/tages/{tag}', 'TagController@update')->name('tag.update');
    Route::delete('/tages/{tag}', 'TagController@destroy')->name('tag.destroy');

    //router post controller


    Route::get('/posts', 'PostsController@index')->name('post.all');
    Route::post('/posts', 'PostsController@store')->name("post.store");
    Route::get('/posts/{post}', 'PostsController@show')->name('post.show');
    Route::put('/posts/update/{post}', 'PostsController@update')->name('post.update');
    Route::put('/posts/count/{post}', 'PostsController@count')->name('post.count');
    Route::delete('/posts/{post}', 'PostsController@destroy')->name('post.destroy');

    //router category controller

    Route::get('/categories', 'CategoryController@index')->name('category.all');
    Route::post('/categories', 'CategoryController@store')->name('category.store');
    Route::get('/categories/{category}', 'CategoryController@show')->name('category.show');
    Route::put('/categories/{category}', 'CategoryController@update')->name('category.update');
    Route::delete('/categories/{category}', 'CategoryController@destroy')->name('category.destroy');
});



// Route::apiResource(['categories' => CategoryController::class]);
