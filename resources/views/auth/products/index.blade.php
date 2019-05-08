@extends('layouts.auth')

@section('content')
	<br/>
	<h3 class="text-center text-light">PRODUCTOS</h3>

	{{--UPDATE MODAL--}}
	<div class="modal fade" id="modal-update" tabindex="-1" role="dialog"
	     aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-0">
					<h4 class="modal-title modal-title-update text-light font-weight-bold"
					    id="exampleModalLongTitle"></h4>
					<button type="button" class="close text-warning btn-close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<h6 class="text-light hint">Actualice los datos que desee</h6>
					<form id="frm-update" method="POST" action="{{route('products.update', ':ID')}}">
						@csrf @method('PUT')
						<input type="hidden" id="edit_id" name="edit_id">

						{{--nombre--}}
						<div class="input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-edit"></i></span>
							</div>
							<input class="form-control modal-input" id="name" name="name" value="" placeholder='NOMBRE DEL PRODUCTO ...' type="text">
						</div>

						{{--precio--}}
						<div class="input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
							</div>
							<input id="price" class="form-control modal-input" name="price" value="" placeholder='PRECIO'>
						</div>

						{{--categoría--}}
						<div class="input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-tag"></i></span>
							</div>
							<select class="form-control modal-input" name="category_id" id="category_id">
								<option value="">SELECCIONÁ UNA CATEGORÍA...</option>
								@foreach($categories as $category)
									<option id="category{{$category->id}}" value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>

						{{--imagen--}}
						{{--					<div class="input-group form-group">--}}
						{{--						<div class="input-group-prepend login-igp">--}}
						{{--							<span class="input-group-text"><i class="fas fa-image"></i></span>--}}
						{{--						</div>--}}
						{{--						<div class="custom-file">--}}
						{{--							<input type="file" class="custom-file-input" id="customFileLang" lang="es" disabled>--}}
						{{--							<label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>--}}
						{{--						</div>--}}
						{{--						@if ($errors->has('price'))--}}
						{{--							<span class="invalid-feedback" role="alert">--}}
						{{--								<strong>{{ $errors->first('price') }}</strong>--}}
						{{--							</span>--}}
						{{--						@endif--}}
						{{--					</div>--}}

						{{--cant en stock--}}
						<div class="input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
							</div>
							<input id="stock" name="stock" class="form-control modal-input" value="">
						</div>
					</form>
				</div>

				<div class="modal-footer border-dark">
					<button type="button" class="btn btn-light btn-edit"> Editar</button>
					<button type="button" class="btn btn-light btn-close btn-close-text"> Cancelar</button>
					<button type="button" id="btn-update" class="btn btn-action btn-save">
						<i class="fas fa-save fa-sm"></i> Guardar
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
					<form id="frm-destroy" style="display: none" action="{{route('products.destroy', ':ID')}}"
					      method="POST">
						@csrf @method('DELETE')
						<input type="hidden" name="destroy_id" id="destroy_id">
					</form>
				</div>
				<div class="modal-footer border-dark">
					<button type="button" class="btn btn-light btn-close btn-close-text"> Cancelar</button>
					<button type="button" id="btn-destroy"
					        class="btn btn-danger btn-action btn-destroy text-dark font-weight-bold">
						<i class="fas fa-trash fa-sm"></i> Eliminar
					</button>
				</div>
			</div>
		</div>
	</div>


	{{--CONTENIDO--}}
	<hr style="border-color: #FFC312"/>

	<div class="row d-flex justify-content-center col-6 offset-3">
		<a href="">
			<button class="btn btn-outline-warning font-weight-bold">
				Agregar un producto
			</button>
		</a>

		{{--filtro de categorías--}}
		<form action="" method="GET">
			@csrf
			<div class="input-group form-group ml-2 col-12">
				<div class="input-group-prepend login-igp">
					<span class="input-group-text"><i class="fas fa-tag"></i></span>
				</div>
				<select id="filter-category" class="form-control" {{--name="category_id" onchange="this.form.submit();"--}}>
					<option value="">Filtrar por categoría...</option>
					<option value="all">TODAS LAS CATEGORÍAS</option>
					@foreach($categories as $category)
						<option {{--id="select_{{$category->id}}"--}} class="select_category" value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
			</div>
		</form>
	</div>


	{{--tabla de productos--}}
	<div class="d-flex justify-content-center">
		<table id="products-table" class="table table-dark table-bordered table-hover table-sm col-md-10">
			<thead>
			<tr class="text-center">
				<th scope="col">ID</th>
				<th scope="col">CATEGORIA</th>
				<th scope="col">NOMBRE</th>
				<th scope="col">PRECIO</th>
				<th scope="col">STOCK</th>
				<th scope="col">EDITAR</th>
				<th scope="col">ELIMINAR</th>
			</tr>
			</thead>
			<tbody class="text-center">
			@foreach($products as $product)
				<tr
				data-id="{{$product->id}}"
				data-name="{{$product->name}}"
				data-price="{{$product->price}}"
				data-stock="{{$product->stock}}"
				data-category="{{$product->category_id}}"
				class="category_item item_{{$product->category_id}}"
				>
					<th scope="row">{{$product->id}}</th>
					<td>{{$product->category->name}}</td>
					<td>{{$product->name}}</td>
					<td>${{$product->price}}</td>
					<td>{{$product->stock}}</td>
					<td>
						<a class="text-primary btn-modal-update" href="">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td class="text-center">
						<a href="" class="text-danger btn-destroy-modal">
							<i class="fas fa-trash align-self-center"></i>
						</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>

	<hr class="border-warning">
@endsection

@section('scripts')
	<script src="{{asset('js/products.index.js')}}"></script>
@endsection
