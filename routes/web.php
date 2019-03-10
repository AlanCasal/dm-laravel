<?php

/**
 * Users
 */
Route::get('/', 'MainController@homeShowProducts')
    ->name('home');

Route::view('/help', 'users.help')
    ->name('help');

Route::get('/users/create', 'UserController@create')
	->name('users.create');

Route::post('/users/create', 'UserController@store');

/**
 * Admin
 */
// Users
Route::get('/users', 'UserController@index')
    ->name('users.index');

Route::get('/users/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

// Categories
Route::get('categories', 'CategoryController@index')
    ->name('categories.index');

// Products
Route::get('products', 'ProductController@index')
    ->name('products.index');