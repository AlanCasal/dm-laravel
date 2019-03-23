<?php

Auth::routes();

Route::view('/inProcess', 'inProcess')
    ->name('inProcess');

Route::middleware('guest')->group(function () {
    Route::get('/', 'MainController@mainPage')
        ->name('home');
    
    Route::view('/help', 'customers.help')
        ->name('help');
});

Route::middleware('auth')->group(function () {
	Route::view('/menu', 'admin.menu')
		->name('menu');

	Route::resource('users', 'UserController');

	Route::resource('categories', 'CategoryController');

	Route::get('products', 'ProductController@index')
		->name('products.index');
});

