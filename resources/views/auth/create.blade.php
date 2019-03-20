@extends('layouts.layout')

@section('title', 'Crear Usuario - Dragon Market - Equipos y Componentes para Gamers')

@section('content')
	<center><h1>Crear Usuario</h1>

	@if($errors->any())
		<div class="alert alert-danger">
			<h5>Por favor corregí los errores</h5>
		</div>
	@endif

	<form action="{{ route('users.store') }}" method="POST">
		@csrf
		<label for="first_name">Nombre </label><br/>
		<input type="text" name="first_name" id="first_name" placeholder="Ingresá tu nombre" value="{{ old('first_name') }}"><br/><br/>
		@if($errors->has('first_name')) <p>{{ $errors->first('first_name') }}</p> @endif

		<label for="last_name">Apellido </label><br/>
		<input type="text" name="last_name" id="last_name" placeholder="Ingresá tu apellido" value="{{ old('last_name') }}"><br/><br/>
		@if($errors->has('last_name')) <p>{{ $errors->first('last_name') }}</p> @endif

		<label for="email">Email </label><br/>
		<input type="email" name="email" id="email" placeholder="Ingresá tu email" value="{{ old('email') }}"><br/><br/>
		@if($errors->has('email')) <p>{{ $errors->first('email') }}</p> @endif

		<label for="password">Contraseña </label><br/>
		<input type="password" name="password" id="password" placeholder="Ingresá una contraseña"><br/><br/><br/>
		@if($errors->has('password')) <p>{{ $errors->first('password') }}</p> @endif

		<button type="submit" class="btn btn-primary">Crear Usuario</button>
	</form>
	</center>
@endsection
