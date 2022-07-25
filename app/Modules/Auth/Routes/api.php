<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/auth', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->namespace('Api\v1')->group(function() {
    //router tag controller
        Route::get('/profile/{user}' , 'AuthController@profile')->name('auth.user.profile')->middleware('auth');
        Route::post('/login' , 'AuthController@login')->name('auth.login');
        Route::post('/register' , 'AuthController@register')->name('auth.register');
        Route::post('/logout' , 'AuthController@logout')->name('auth.logout');
    });
