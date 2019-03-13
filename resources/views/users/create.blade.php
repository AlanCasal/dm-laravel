@extends('layouts.layout')

@section('title', 'Crear Usuario - Dragon Market - Equipos y Componentes para Gamers')

@section('section')
	<center><h1>Crear Usuario</h1></center>

	<form action="{{ url('users/create') }}" method="POST">
		@csrf

		<label for="first_name">Nombre </label><br/>
		<input type="text" name="first_name" id="first_name"><br/><br/>

		<label for="last_name">Apellido </label><br/>
		<input type="text" name="last_name" id="last_name"><br/><br/>

		<label for="email">Email </label><br/>
		<input type="email" name="email" id="email"><br/><br/>

		<label for="password">Contraseña </label><br/>
		<input type="password" name="password" id="password"><br/><br/><br/>

		<button type="submit" class="btn btn-primary">Crear Usuario</button>
	</form>
@endsection
