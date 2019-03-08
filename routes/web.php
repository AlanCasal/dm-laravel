<?php

Route::get('/', 'MainController@homeShowProducts')
    ->name('home');

Route::view('/ayuda', 'ayuda')
    ->name('help');

// Users
Route::get('/users', 'UserController@index')
    ->name('users.index');

Route::get('/users/{id}', 'UserController@show')
    ->where('id', '[0-9]+')
    ->name('users.show');

// Categories
Route::get('categories', 'CategoryController@index')
    ->name('categories.index');

// Products
Route::get('products', 'ProductController@index')
    ->name('products.index');