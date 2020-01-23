<?php

Auth::routes(['verify' => true]);

Route::redirect('/', '/home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductController@index')->name('products');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::get('/product/{product}/edit', 'ProductController@edit')->name('product.edit');

Route::get('/profile', 'ProfileController@index')->name('users.profile');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::get('/security', 'SecurityController@index')->name('users.security');
Route::patch('/security/{user}', 'SecurityController@update')->name('security.update');
