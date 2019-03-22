<?php

/*****************************
 * Clientes
 *****************************/

Route::get('/', 'MainController@mainPage')
    ->name('home');

Route::view('/help', 'guests.help')
    ->name('help');

Route::view('/inProcess', 'inProcess')
	->name('inProcess');

/*****************************
 * Users
 *****************************/

Route::middleware('auth')->group(function () {
	Route::view('/menu', 'admin.menu')
		->name('menu');

	Route::resource('users', 'UserController');

	Route::get('categories', 'CategoryController@index')
		->name('categories.index');

	Route::get('products', 'ProductController@index')
		->name('products.index');
});

Auth::routes();
