<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sendevent', function () {
    event(new \App\Events\MyEvent());

    return 'done';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
