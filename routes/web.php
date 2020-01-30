<?php

Auth::routes(['verify' => true]);

Route::redirect('/', '/home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/suppliers', 'SupplierController@index')->name('suppliers');
Route::post('/suppliers', 'SupplierController@store')->name('suppliers.store');
Route::get('/supplier/{supplier}/edit', 'SupplierController@edit')->name('supplier.edit');
Route::patch('/supplier/{supplier}', 'SupplierController@update')->name('supplier.update');
Route::delete('/supplier/{supplier}', 'SupplierController@destroy')->name('supplier.destroy');

Route::get('/products', 'ProductController@index')->name('products');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::get('/product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('/product/{product}', 'ProductController@update')->name('product.update');
Route::delete('/product/{product}', 'ProductController@destroy')->name('product.destroy');

Route::get('/inventory', 'InventoryController@index')->name('inventory');
Route::post('/inventory', 'InventoryController@store')->name('inventory.store');
Route::get('/inventory/{inventory}/edit', 'InventoryController@edit')->name('inventory.edit');
Route::patch('/inventory/{inventory}', 'InventoryController@update')->name('inventory.update');

Route::get('/customers', 'CustomerController@index')->name('customers');
Route::post('/customers', 'CustomerController@store')->name('customers.store');
Route::get('/customer/{customer}/edit', 'CustomerController@edit')->name('customer.edit');
Route::patch('/customer/{customer}', 'CustomerController@update')->name('customer.update');
Route::delete('/customer/{customer}', 'CustomerController@destroy')->name('customer.destroy');

Route::get('/profile', 'ProfileController@index')->name('users.profile');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::get('/security', 'SecurityController@index')->name('users.security');
Route::patch('/security/{user}', 'SecurityController@update')->name('security.update');
