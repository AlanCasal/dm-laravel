@extends('layouts.auth')

@section('content')
	<br/>
	<ul style="color: white">
		<h3 class="text-center">PRODUCTOS</h3>

		{{--ALERTAS--}}
		@if(isset($data['store']))
			<div class="alert alert-success alert-dismissible text-success fade show col-md-4 offset-md-4 text-center"
			     role="alert">
				<h5>
					<i class="fas fa-check-circle"></i> PRODUCTO AGREGADO
				</h5>
				<hr/>
				<p>EL PRODUCTO <strong>{{$data['store']}}</strong> HA SIDO AGREGADO.</p>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@elseif(isset($data['destroy']))
			<div class="alert alert-danger alert-dismissible text-danger fade show col-md-4 offset-md-4 text-center"
			     role="alert">
				<h5>
					<i class="fas fa-trash-alt"></i> PRODUCTO ELIMINADO
				</h5>
				<hr>
				<p>EL PRODUCTO <strong>{{$data['destroy']}}</strong> HA SIDO ELIMINADO.</p>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@elseif(isset($data['update']))
			<div class="alert alert-primary alert-dismissible text-primary fade show col-md-4 offset-md-4 text-center"
			     role="alert">
				<h5>
					<i class="fas fa-sync-alt"></i> PRODUCTO ACTUALIZADO
				</h5>
				<hr/>
				<ul>
					<li>NOMBRE: {{$data['update'][0]}} > <strong>{{$data['update'][1]}}</strong></li>
					<li>PRECIO: ${{$data['update'][2]}} > <strong>${{$data['update'][3]}}</strong></li>
					<li>CATEGORÍA: {{$data['update'][4]}} > <strong>{{$data['update'][5]}}</strong></li>
					<li>STOCK: {{$data['update'][6]}} > <strong>{{$data['update'][7]}}</strong></li>
					<li>ACTIVO: {{$data['update'][8]}} > <strong>{{$data['update'][9]}}</strong></li>
				</ul>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif

		{{--CONTENIDO--}}
		<hr style="border-color: #FFC312"/>

		<div class="row d-flex justify-content-center">
			<a href="{{route('products.create')}}">
				<button class="btn btn-outline-warning font-weight-bold">
					Agregar un producto
				</button>
			</a>

			{{--filtro de categorías--}}
			<form action="{{route('products.index')}}" method="GET">
				@csrf
				<div class="input-group form-group offset-1">
					<div class="input-group-prepend login-igp">
						<span class="input-group-text"><i class="fas fa-tag"></i></span>
					</div>
					<select class="form-control" name="category_id" onchange="this.form.submit();">
						<option value="">Filtrar por categoría...</option>
						<option value="">TODAS LAS CATEGORÍAS</option>
						@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
					@if ($errors->has('category_id'))
						<span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
					@endif
				</div>
			</form>
		</div>

		{{--tabla de productos--}}
		<div class="d-flex justify-content-center">
			<table class="products-table table table-striped table-dark table-bordered table-hover table-sm col-md-10">
				<thead>
				<tr class="text-center">
					<th scope="col">ID</th>
					<th scope="col">CATEGORIA</th>
					<th scope="col">NOMBRE</th>
					<th scope="col">PRECIO</th>
					<th scope="col">STOCK</th>
					<th scope="col">ACTIVO</th>
					<th scope="col">EDITAR</th>
					<th scope="col">ELIMINAR</th>
				</tr>
				</thead>
				<tbody class="text-center">
				@if ($products[0] != null)
					@foreach($products as $product)
						<tr
								@if(isset($data['store']) && $product->name == $data['store'])
								class="font-weight-bold font-italic text-success"
								@elseif(isset($data['update'][1]) && $product->name == $data['update'][1])
								class="font-weight-bold font-italic text-primary"
								@endif
						>
							<th scope="row">{{$product->id}}</th>
							<td>{{$product->category->name}}</td>
							<td>{{$product->name}}</td>
							<td>${{$product->price}}</td>
							<td>{{$product->stock}}</td>
							<td>{{$product->active}}</td>
							<td>
								<a class="text-primary" href="{{route('products.edit', $product)}}"><i
											class="fas fa-edit"></i></a>
							</td>
							<td class="text-center">
								<a href="" class="text-danger"
								   onclick="event.preventDefault(); $('#frm-destroy{{$product->id}}').submit();">
									<form id="frm-destroy{{$product->id}}"
									      action="{{ route('products.destroy', $product) }}" method="POST"
									      style="display: none;">
										@csrf @method('DELETE')
									</form>
									<i class="fas fa-trash align-self-center"></i>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
				@else
				</tbody>
			</table>
		</div>
		<h4 class="text-center">No se encontraron productos {{$category->name != 'SIN CATEGORIA'? 'en la categoría ': ''}} {{$category->name}}</h4>
				@endif

		<hr class="border-warning">
		<div class="d-flex justify-content-center">{{$products->links()}}</div>
	</ul>
@endsection
