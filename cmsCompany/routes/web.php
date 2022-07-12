<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use  App\Http\Controllers\CommentController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function(){
    Route::prefix('category')->group(function () {
        route::get("/",[CategoryController::class, 'index'])->name('admin.category.index');
    });

    Route::prefix('users')->group(function () {
        route::get("/",[UserController::class, 'index'])->name('admin.user.index');
    });
    Route::prefix('Article')->group(function () {
        route::get("/",[ArticleController::class, 'index'])->name('admin.Article.index');
    });
    Route::prefix('comment')->group(function () {
        route::get("/",[CommentController::class, 'index'])->name('admin.comment.index');
    });
});

