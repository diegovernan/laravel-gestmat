<?php

Auth::routes(['verify' => true]);

Route::redirect('/', '/home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductController@index')->name('products');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::get('/product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('/product/{product}', 'ProductController@update')->name('product.update');
Route::delete('/product/{product}', 'ProductController@destroy')->name('product.destroy');

Route::get('/inventory', 'InventoryController@index')->name('inventory');
Route::post('/inventory', 'InventoryController@store')->name('inventory.store');

Route::get('/customers', 'CustomerController@index')->name('customers');
Route::post('/customers', 'CustomerController@store')->name('customers.store');
Route::get('/customer/{customer}/edit', 'CustomerController@edit')->name('customer.edit');

// Route::get('/customers', function () {
//     return view('customers');
// })->name('customers');

Route::get('/profile', 'ProfileController@index')->name('users.profile');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::get('/security', 'SecurityController@index')->name('users.security');
Route::patch('/security/{user}', 'SecurityController@update')->name('security.update');
