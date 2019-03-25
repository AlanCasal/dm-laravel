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

	Route::resource('users', 'UserController')
		->only('index' ,'create', 'store', 'destroy');

	Route::resource('categories', 'CategoryController')
		->only('index', 'create', 'store');

	Route::get('products', 'ProductController@index')
		->name('products.index');
});

