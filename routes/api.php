<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => ['auth:api']], function(){
    Route::post('details', 'API\UserController@details');
    Route::post('logout', 'API\UserController@logout');
    Route::post('post/like/{id}', 'PostController@like');
    Route::post('comment/{id}', 'CommentController@create');
});

Route::group(['middleware' => ['auth:api', 'check.auth']], function(){
    Route::post('post', 'PostController@create');
    Route::put('post/{id}', 'PostController@update');
    Route::delete('post/{id}', 'PostController@delete');

    Route::get('tag', 'TagController@index');
    Route::get('tag/{id}', 'TagController@show');
    Route::post('tag', 'TagController@create');
    Route::put('tag/{id}', 'TagController@update');
    Route::delete('tag/{id}', 'TagController@delete');

    Route::post('post/add_tag/{id}', 'PostController@add_tag');
});

Route::get('post', 'PostController@index');
Route::get('post/{id}', 'PostController@find');