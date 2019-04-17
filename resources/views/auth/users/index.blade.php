@extends('layouts.auth')

@section('content')
	<br>
	<ul style="color: white;">
		@if(isset($users))
			<h3 class="d-flex justify-content-center">USUARIOS</h3>

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

			<div class="d-flex justify-content-center">
				<a href="{{route('users.create')}}">
					<button class="btn btn-outline-warning font-weight-bold">
						Agregar un usuario
					</button>
				</a>
			</div>
			<br/>

			<div class="d-flex justify-content-center">
				<table class="users-table table table-dark table-striped table-bordered table-hover text-center col-md-5">
					<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">USUARIO</th>
						<th scope="col">EMAIL</th>
						<th scope="col">JERARQUÍA</th>
						<th scope="col">ELIMINAR</th>
					</tr>
					</thead>
					<tbody>
					@foreach ($users as $user)
						<tr data-id="{{$user->id}}">
							<th>{{$user->id}}</th>
							<td>{{$user->username}}</td>
							<td>{{$user->email}}</td>
							<td>
								@if($user->is_admin) {{'Administrador'}}
								@else {{'Usuario'}}
								@endif
							</td>
							<td class="text-center">
							@if(!$user->is_admin)
								<a href="" class="btn-destroy text-danger">
									<form id="frm-destroy{{$user->id}}" action="{{route('users.destroy', $user)}}" method="POST" style="display: none;">
										@csrf @method('DELETE')
									</form>
									<i class="fas fa-trash align-self-center"></i>
								</a>
							@endif
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		@else
			No hay usuarios registrados. :(
		@endif
	</ul>
@endsection

@section('scripts')
	<script src="{{asset('js/user.index.js')}}"></script>
@endsection