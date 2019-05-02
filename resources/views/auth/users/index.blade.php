@extends('layouts.auth')

@section('content')
	{{--CREATE MODAL--}}
	<div class="modal fade" id="modal-store" tabindex="-1" role="dialog"
	     aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-category modal-content">
				<div class="modal-header border-0">
					<h4 class="modal-title modal-title-store text-light font-weight-bold"
					    id="exampleModalLongTitle"></h4>
					<button type="button" class="close text-warning btn-close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="frm-store" method="POST" action="{{route('users.store')}}">
						@csrf
						<div class="input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input id="username" name="username" type="text" class="form-control" value="" placeholder="Nombre de usuario" autofocus>
						</div>

						<div class="input-group form-group">
							<div class="input-group-prepend login-igp-disabled">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input id="email" name="email" type="text" class="form-control" value="" disabled>
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2">@dragonmarket.com.ar</span>
							</div>
						</div>

						<div class="input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input id="password" type="password" name="password" class="form-control" placeholder="Contraseña">
						</div>

						<div class="input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input id="password-confirm" name="password-confirm" type="password" class="form-control" placeholder="Confirmá la contraseña">
						</div>

					</form>
				</div>
				<div class="modal-footer border-dark">
					<button type="button" class="btn btn-light btn-edit"> Editar</button>
					<button type="button" class="btn btn-light btn-close btn-close-text"> Cancelar</button>
					<button type="button" id="btn-store" class="btn btn-action btn-save"><i
								class="fas fa-save fa-sm"></i> Crear
					</button>
				</div>
			</div>
		</div>
	</div>

	{{--DESTROY MODAL--}}
	<div class="modal fade" id="modal-destroy" tabindex="-1" role="dialog"
	     aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-category modal-content">
				<div class="modal-header border-0">
					<h6 class="modal-title modal-title-destroy text-light"
					    id="exampleModalLongTitle"></h6>
					<button type="button" class="close text-danger btn-close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<form id="frm-destroy" style="display: none" action="{{route('users.destroy', ':ID')}}" method="POST">
						@csrf @method('DELETE')
						<input type="hidden" name="destroy_id" id="destroy_id">
					</form>
				</div>
				<div class="modal-footer border-dark">
					<button type="button" class="btn btn-light btn-close btn-close-text"> Cancelar</button>
					<button type="button" id="btn-destroy" class="btn btn-danger btn-action btn-destroy text-dark font-weight-bold">
						<i class="fas fa-trash fa-sm"></i> Eliminar
					</button>
				</div>
			</div>
		</div>
	</div>

	<br>
	<h3 class="d-flex justify-content-center">USUARIOS</h3>
	<hr style="border-color: #FFC312"/>

	<div class="d-flex justify-content-center">
		<a href="">
			<button id="btn-store-modal" class="btn btn-outline-warning font-weight-bold">
				<i class="fas fa-plus"></i> Agregar un usuario
			</button>
		</a>
	</div>
	<br/>

	<div class="d-flex justify-content-center">
		<table class="users-table table table-dark table-striped table-bordered table-hover text-center table-sm col-md-5">
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
				<tr data-id="{{$user->id}}" data-username="{{$user->username}}">
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
							<a href="" class="btn-destroy-modal text-danger">
								<i class="fas fa-trash align-self-center"></i>
							</a>
						@endif
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('scripts')
	<script src="{{asset('js/user.index.js')}}"></script>
@endsection