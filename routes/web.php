<?php

Route::get('/', 'MainController@homeShowProducts')
    ->name('home');

Route::view('/help', 'users.help')
    ->name('help');

Route::resource('users', 'UserController');

Route::get('categories', 'CategoryController@index')
    ->name('categories.index');

Route::get('products', 'ProductController@index')
    ->name('products.index');

