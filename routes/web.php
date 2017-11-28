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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/add', 'AddEntityController@index')->name('addEntity');
Route::post('/add', 'AddEntityController@store')->name('addEntity');
Route::get('/entity/{id}','HomeController@show')->name('showEntity');
Route::get('/messages','MessagesController@index')->name('messages');
Route::get('/messages/{id}','MessagesController@show')->name('message');
Route::get('/my','ProfilController@index')->name('profil');
Route::get('/top','TopController@index')->name('top');
Route::get('/search','SearchController@index')->name('search');