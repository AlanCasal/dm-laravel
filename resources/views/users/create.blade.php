@extends('layouts.layout')

@section('title', 'Crear Usuario - Dragon Market - Equipos y Componentes para Gamers')

@section('section')
	<center><h1>Crear Usuario</h1></center>

	<form action="{{ url('users/create') }}" method="POST">
		@csrf
		<center><button type="submit">Crear Usuario</button></center>
	</form>
@endsection
