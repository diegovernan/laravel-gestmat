<?php

Auth::routes(['verify' => true]);

Route::redirect('/', '/home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('users.profile');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::get('/security', 'SecurityController@index')->name('users.security');
