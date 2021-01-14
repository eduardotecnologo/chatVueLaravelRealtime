<?php

use Illuminate\Support\Facades\Route;

Route::get('chat', 'Chat\ChatController@index')->middleware('auth')->name('chat.index');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
