<?php

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

/*Route::get('films', 'FilmController@index')->name('films');
Route::get('films/create', 'FilmController@create')->name('films.create');
Route::get('film/{slug}', 'FilmController@show')->name('film.show');*/

/*Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'as'=>'admin.'], function(){
	Route::resource('countries', 'CountryController');
	Route::resource('genre', 'GenreController');
	Route::resource('films', 'FilmController');

});
*/Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

