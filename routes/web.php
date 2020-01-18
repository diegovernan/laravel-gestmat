<?php

Auth::routes(['verify' => true]);

Route::redirect('/', '/home');

Route::get('/home', 'HomeController@index')->name('home');
