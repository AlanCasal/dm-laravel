@extends('layouts.auth')

@section('content')
	<ul style="color: white;">
		@if(isset($users))
			<h3>Usuarios</h3>

			@if(isset($data['store']))
				<div class="alert alert-success alert-dismissible text-success fade show col-md-4 offset-md-4 text-center"
				     role="alert">
					<h5>
						<i class="fas fa-check-circle"></i> USUARIO CREADO
					</h5>
					<hr/>
					<p>EL USUARIO <strong>{{$data['store']}}</strong> HA SIDO CREADO.</p>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			@elseif(isset($data['destroy']))
				<div class="alert alert-danger alert-dismissible text-danger fade show col-md-4 offset-md-4 text-center"
				     role="alert">
					<h5>
						<i class="fas fa-trash-alt"></i> USUARIO ELIMINADO
					</h5>
					<hr>
					<p>EL USUARIO <strong>{{$data['destroy']}}</strong> HA SIDO ELIMINADO.</p>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			@endif

			<hr style="border-color: #FFC312"/>
			<a href="{{route('auth')}}">
				<button class="btn btn-outline-warning">
					Agregar un usuario
				</button>
			</a>
			<br/>
			<br/>
			@foreach ($users as $user)
				<li>
					<form action="{{ route('users.destroy', $user->id) }}" method="POST">
						@method('DELETE')
						@csrf
						{{ $user->id }}. {{ $user->username }}, {{ $user->email }},
						@if($user->is_admin) {{ 'Administrador' }},
						@else {{ 'Usuario' }},
						@endif
						<button type="submit" class="btn btn-link" style="font-size: 1em">Eliminar</button>
					</form>
				</li>
			@endforeach
		@else
			No hay usuarios registrados. :(
		@endif
	</ul>
@endsection
