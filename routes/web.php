<?php

use Illuminate\Support\Facades\Route;
Route::group(['middleware' => 'auth'], function (){
    Route::get('chat', 'Chat\ChatController@index')->name('chat.index');
    Route::get('chat/messages', 'Chat\ChatController@messages')->name('chat.messages');
    Route::post('chat/message', 'Chat\ChatController@store')->name('chat.store');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
