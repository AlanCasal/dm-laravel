<?php

/*****************************
 * Terminadas
 *****************************/
Route::resource('users', 'UserController');

Route::get('/', 'MainController@homeShowProducts')
    ->name('home');

Route::view('/help', 'users.help')
    ->name('help');

/*****************************
 * En proceso
 *****************************/

Route::view('/inProcess', 'inProcess')
    ->name('inProcess');

Route::get('categories', 'CategoryController@index')
    ->name('categories.index');

Route::get('products', 'ProductController@index')
    ->name('products.index');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
