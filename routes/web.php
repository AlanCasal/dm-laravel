<?php

Route::get('/', 'MainController@homeShowProducts')
    ->name('home');

Route::view('/ayuda', 'ayuda')
    ->name('help');

Route::get('/users', 'adminUsersController@index')
    ->name('users.index');

Route::get('/users/{id}', 'AdminUsersController@show')
    ->where('id', '[0-9]+')
    ->name('users.show');

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
