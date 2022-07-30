<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Entities\Post;
use Modules\Blog\Transformers\v1\PostResource;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/p', function () {
    $p = new PostResource(Post::find(2));
    return $p;
});
