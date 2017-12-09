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
Route::get('/entity/{id}', 'HomeController@show')->name('showEntity');
Route::get('/entity/{id}/rate', 'HomeController@rate')->name('rateEntity');
Route::get('/entity/{id}/delete', 'HomeController@delete')->name('deleteEntity');
Route::post('/entity/{id}/comment/add', 'HomeController@addComment')->name('addComment');
Route::get('/messages', 'MessagesController@index')->name('messages');
Route::get('/messages/show/{id}', 'MessagesController@show')->name('message');
Route::get('/messages/new', 'MessagesController@newConversation')->name('newConversation');
Route::post('/messages/send', 'MessagesController@sendMessage')->name('sendMessage');
Route::get('/top', 'TopController@index')->name('top');
Route::get('/top/{time}', 'TopController@show')->name('topTime');
Route::get('/search', 'SearchController@index')->name('search');
Route::post('/search', 'SearchController@show')->name('searchPhase');
Route::get('/user/search', 'UserController@search')->name('userAutocomplete');
Route::get('/profile/{id}', 'ProfilController@show')->name('showProfile');
Route::get('/profile/{id}/edit', 'ProfilController@edit')->name('editProfile');
Route::post('/profile/{id}/edit', 'ProfilController@editProfile')->name('saveEditedProfile');
Route::get('/login/{service}/callback', 'AuthController@auth')->name('oauth');
Route::get('/login/{service}', 'AuthController@send')->name('send');
Route::get('/currency', 'CurrencyController@index')->name('currency');
Route::get('/currency/{currency}', 'CurrencyController@show')->name('changeCurrency');
