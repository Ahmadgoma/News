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

Auth::routes();
Route::get('/news', 'NewsController@index')->middleware('admin');
Route::post('/news/store', 'NewsController@store')->middleware('admin');
Route::get('/news/create', 'NewsController@create')->middleware('admin');
Route::get('/news/{id}/edit', 'NewsController@edit')->middleware('admin');
Route::post('/news/{id}/update', 'NewsController@update')->middleware('admin');
Route::get('/news/{id}', 'NewsController@show')->middleware('admin');

Route::get('/news/{id}/delet', 'NewsController@destroy')->middleware('admin');
Route::get('/news/{id}/delete', 'NewsController@destroyImg')->middleware('admin');
Route::post('/search','NewsController@search')->middleware('admin');;
Route::post('/searchDate','NewsController@searchWithDate')->middleware('admin');;



Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->middleware('admin');
Route::get('/control', 'HomeController@control')->middleware('admin');
Route::post('/updateRole/{user}', 'HomeController@updateRole')->middleware('admin');