<?php

/**
 * rutas globales
 */
Auth::routes();

Route::view('/inProcess', 'inProcess')
    ->name('inProcess');

/**
 * rutas Guest
 */
Route::middleware('guest')->group(function () {
    Route::get('/', 'MainController@mainPage')
        ->name('home');
    
    Route::view('/help', 'customers.help')
        ->name('help');
});

/**
 * rutas Auth
 */
Route::middleware('auth')->group(function () {
	Route::view('/menu', 'admin.menu')
		->name('menu');

	Route::resource('users', 'UserController')
		->only('index' ,'create', 'store', 'destroy');

	Route::resource('categories', 'CategoryController')
		->except('show');

	Route::resource('products', 'ProductController');
});