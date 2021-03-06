@extends('layouts.auth')

@section('content')
	{{--CREATE MODAL--}}
	<div class="modal fade" id="modal-store" tabindex="-1" role="dialog"
	     aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class=" modal-content">
				<div class="modal-header border-0">
					<h4 class="modal-title modal-title-store text-light font-weight-bold"
					    id="exampleModalLongTitle"></h4>
					<button type="button" class="close text-warning btn-close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<h6 class="text-light hint">Ingrese un nombre para la nueva categoría</h6>
					<form id="frm-store" method="POST" action="{{route('categories.store')}}">
						@csrf
						<div class="input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-edit"></i></span>
							</div>
							<input id="store_name" type="text" class="form-control" name="name" value=""
							       placeholder="INGRESÁ UN NOMBRE ...">
						</div>
					</form>
				</div>
				<div class="modal-footer border-dark">
					<button type="button" class="btn btn-light btn-edit"> Editar</button>
					<button type="button" class="btn btn-light btn-close btn-close-text"> Cancelar</button>
					<button type="button" id="btn-store" class="btn btn-action btn-save"><i
								class="fas fa-save fa-sm"></i> Guardar
					</button>
				</div>
			</div>
		</div>
	</div>

	{{--UPDATE MODAL--}}
	<div class="modal fade" id="modal-update" tabindex="-1" role="dialog"
	     aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class=" modal-content">
				<div class="modal-header border-0">
					<h4 class="modal-title modal-title-update text-light font-weight-bold"
					    id="exampleModalLongTitle"></h4>
					<button type="button" class="close text-warning btn-close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<h6 class="text-light hint">Ingrese un nuevo nombre para la categoría</h6>
					<form id="frm-update" method="POST" action="{{route('categories.update', ':ID')}}">
						@csrf @method('PUT')
						<input type="hidden" name="edit_id" id="edit_id">
						<div class="input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-edit"></i></span>
							</div>
							<input id="edit_name" type="text" class="form-control" name="name" value=""
							       placeholder="INGRESÁ UN NOMBRE ...">
						</div>
					</form>
				</div>
				<div class="modal-footer border-dark">
					<button type="button" class="btn btn-light btn-edit"> Editar</button>
					<button type="button" class="btn btn-light btn-close btn-close-text"> Cancelar</button>
					<button type="button" id="btn-update" class="btn btn-action btn-save"><i
								class="fas fa-save fa-sm"></i> Guardar
					</button>
				</div>
			</div>
		</div>
	</div>

	{{--DESTROY MODAL--}}
	<div class="modal fade" id="modal-destroy" tabindex="-1" role="dialog"
	     aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class=" modal-content">
				<div class="modal-header border-0">
					<h6 class="modal-title modal-title-destroy text-light"
					    id="exampleModalLongTitle"></h6>
					<button type="button" class="close text-danger btn-close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<form id="frm-destroy" style="display: none" action="{{route('categories.destroy', ':ID')}}" method="POST">
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

	<br/>
	<h3 class="text-center text-light">CATEGORÍAS</h3>

	<hr style="border-color: #FFC312"/>
	<div class="d-flex justify-content-center">
		<a href="">
			<button id="btn-store-modal" class="btn btn-outline-warning font-weight-bold">
				<i class="fas fa-plus"></i>
				Agregar una categoría
			</button>
		</a>
	</div>
	<br/>

	{{--TABLA--}}
	<div class="d-flex justify-content-center col-md-4 offset-md-4">
		<table class="categories-table table table-striped table-dark table-bordered table-hover table-sm table-responsive-md">
			<thead>
			<tr class="text-center">
				<th scope="col">ID</th>
				<th style="width: 70%" scope="col">NOMBRE</th>
				<th scope="col">EDITAR</th>
				<th scope="col">ELIMINAR</th>
			</tr>
			</thead>
			<tbody class="text-center">
			@forelse($categories as $category)
				<tr id="row{{$category->id}}" data-id="{{$category->id}}" data-name="{{$category->name}}">
					<th scope="row">{{$category->id}}</th>
					<td>{{$category->name}}</td>
					<td>
						@if($category->name != 'SIN CATEGORIA')
							<a href="" class="btn-modal-update text-primary"><i class="fas fa-edit"></i></a>
						@endif
					</td>
					<td class="text-center">
						@if($category->name != 'SIN CATEGORIA')
							<a href="" class="btn-destroy-modal text-danger">
								<i class="fas fa-trash align-self-center"></i>
							</a>
						@endif
					</td>
				</tr>
			@empty
				<li>No se encontraron categorías en la base de datos.</li>
			@endforelse
			</tbody>
		</table>
	</div>
@endsection

@section('scripts')
	<script src="{{asset('js/category.index.js')}}"></script>
@endsection
