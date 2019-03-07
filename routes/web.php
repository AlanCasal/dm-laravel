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

Route::get('/addUser', function () {
	return view('addUser');
});

Route::get('/addCat', function () {
	return view('addCat');
});

// Route::get('/user/{id}', function($id) {
// 	return "Mostrando detalle de user {$id}";
// })->where('id', '[0-9]+'); // EXPRESIÓN REGULAR: el parámetro que recibe tiene que ser un numero
//
// Route::get('/user/nuevo', function() { // el parámetro que recibe tiene que ser el string 'nuevo'
// 	return 'Crear user nuevo';
// });
//
// Route::get('/saludo/{name}/{nick?}', function($name, $nick = null) {
// 	if ($nick): return "Bienvenido {$name}, tu nick es {$nick}";
// 	else:		return "Bienvenido {$name}, aún no tienes un nick";
// 	endif;
// });
