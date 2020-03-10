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

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/messages', 'MessageController@index');

    Route::get('/messages/create', 'MessageController@create');

    Route::post('/messages', 'MessageController@store');

    Route::get('/messages/{message}', 'MessageController@show');

    Route::get('/messages/{message}/edit', 'MessageController@edit');

    Route::patch('/messages/{message}', 'MessageController@update');

    Route::delete('/messages/{message}', 'MessageController@destroy');

   Route::get('/messages/answer/{message}','ChildMessageController@create');
    Route::get('/messages/personal/show','PersonalMessageController@index');
    Route::get('/messages/personal/{message}','PersonalMessageController@create');


});

