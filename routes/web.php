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
    
    Route::view('/help', 'guest.help')
        ->name('help');
});

/**
 * rutas Auth
 */
Route::middleware('auth')->group(function () {
	Route::view('/menu', 'auth.menu')
		->name('menu');

	Route::resource('users', 'UserController')
		->only('index', 'store', 'destroy');

	Route::resource('categories', 'CategoryController')
		->only('index', 'store', 'update', 'destroy');

	Route::resource('products', 'ProductController')
		->only('index', 'store', 'update', 'destroy');
		//->except('create', 'show', 'edit');

	Route::get('/products/get_products', 'ProductController@get_products');
});
