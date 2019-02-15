<?php

Route::get('/', 'MainController@homeShowProducts');

Route::get('/users', function () {
	return 'SOY LA COSA!';
});

Route::get('/ayuda', function () {
	return view('ayuda');
});

Route::get('/sidebar', function () {
	return view('sidebar');
});

// Route::get('/user/{id}', function($id) {
// 	return "Mostrando detalle de user {$id}";
// })->where('id', '[0-9]+'); // EXPRESIÓN REGULTAR: el parametro que recibe tiene que ser un numero
//
// Route::get('/user/nuevo', function() { // el parametro que recibe tiene que ser el string 'nuevo'
// 	return 'Crear user nuevo';
// });
//
// Route::get('/saludo/{name}/{nick?}', function($name, $nick = null) {
// 	if ($nick): return "Bienvenido {$name}, tu nick es {$nick}";
// 	else:		return "Bienvenido {$name}, aún no tienes un nick";
// 	endif;
// });
