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

    Route::get('/messages/personal','PersonalMessageController@index');

    Route::get('/messages/personal/written','PersonalMessageController@indexWritten');

    Route::get('/messages/create', 'MessageController@create');

    Route::post('/messages', 'MessageController@store');

    Route::get('/messages/{message}', 'MessageController@show');

    Route::get('/messages/{message}/edit', 'MessageController@edit');

    Route::patch('/messages/{message}', 'MessageController@update');

    Route::delete('/messages/{message}', 'MessageController@destroy');


    Route::get('/messages/personal/{message}','PersonalMessageController@show');

    Route::get('/messages/personal/{message}/create','PersonalMessageController@create');

    Route::post('/messages/personal','PersonalMessageController@store');

    Route::get('/messages/personal/{message}/edit','PersonalMessageController@edit');

    Route::patch('/messages/personal/{message}','PersonalMessageController@update');

    Route::delete('/messages/personal/{message}', 'PersonalMessageController@destroy');


    Route::get('/messages/answer/{message}/create','AnswerMessageController@create');

    Route::get('/messages/answer/{message}/edit','AnswerMessageController@edit');

    Route::get('/messages/answer/{message}','AnswerMessageController@show');

    Route::post('/messages/answer','AnswerMessageController@store');

    Route::patch('/messages/answer/{message}','AnswerMessageController@update');

    Route::delete('/messages/answer/{message}', 'AnswerMessageController@destroy');

});

