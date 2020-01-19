<?php

Auth::routes(['verify' => true]);

Route::redirect('/', '/home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', function () {
    return view('users.profile');
})->name('users.profile');