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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
	Route::get('films', 'API\FilmController@index');
	Route::get('films/{id}', 'API\FilmController@show');
	Route::post('films', 'API\FilmController@store');
	Route::put('films/{id}', 'API\FilmController@update');
	Route::delete('films/{id}', 'API\FilmController@delete');
});
