<?php

Auth::routes(['verify' => true]);

Route::redirect('/', '/home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('users.profile');

Route::get('/security', function () {
    return view('users.security');
})->name('users.security');