@extends('layouts.auth')

@section('content')
	<div class="row justify-content-center">
		<div class="login_card card col-md-4">
			<div class="card-header card-header-login">
				<h3>Editar producto</h3>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('products.update', $product) }}" class="">
					@csrf @method('PUT')

					{{--nombre--}}
					<div class="input-group form-group">
						<div class="input-group-prepend login-igp">
							<span class="input-group-text"><i class="fas fa-edit"></i></span>
						</div>
						<input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
						       name="name" value="{{old('name', $product->name)}}" placeholder="{{old('name', 'NOMBRE DEL PRODUCTO ...')}}" type="text" autofocus>
						@if ($errors->has('name'))
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
						@endif
					</div>

					{{--precio--}}
					<div class="input-group form-group">
						<div class="input-group-prepend login-igp">
							<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
						</div>
						<input id="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
						       name="price" value="{{old('price', $product->price)}}" placeholder="{{old('price', 'PRECIO')}}">
						@if ($errors->has('price'))
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
						@endif
					</div>

					{{--categoría--}}
					<div class="input-group form-group">
						<div class="input-group-prepend login-igp">
							<span class="input-group-text"><i class="fas fa-tag"></i></span>
						</div>
						<select class="form-control{{ $errors->has('category_id') ? ' is-invalid' : ''}}" name="category_id">
							<option value="">SELECCIONÁ UNA CATEGORÍA...</option>
							@foreach($categories as $category)
								<option value="{{$category->id}}" {{$product->category_id == $category->id ? "selected" : ''}}>{{$category->name}}</option>
							@endforeach
						</select>
						@if ($errors->has('category_id'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('category_id') }}</strong>
							</span>
						@endif
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

					{{--activo inactivo--}}
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="activeRadio1" name="active" class="custom-control-input" value="SI" {{$product->active == true ? "checked" : ''}}>
						<label class="custom-control-label text-light" for="activeRadio1">Activo</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="activeRadio2" name="active" class="custom-control-input {{$errors->has('active')? ' is-invalid': ''}}" value="NO" {{$product->active == false? "checked" : ''}}>
						<label class="custom-control-label text-light" for="activeRadio2">Inactivo</label>
						@if ($errors->has('active'))
							<span class="invalid-feedback custom-control" role="alert">
								<strong>{{ $errors->first('active') }}</strong>
							</span>
						@endif
					</div>

					{{--cant en stock--}}
					<div class="form-row">
						<div class="{{$errors->has('stock')? "col-md-5": "col-md-4"}} my-1 input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
							</div>
							<select class="mr-sm-2 form-control{{ $errors->has('stock') ? ' is-invalid' : ''}}" id="inlineFormCustomSelect" name="stock">
								<option value="">Cantidad...</option>
								@for ($i = 0; $i < 100; $i++)
									<option value="{{$i}}" {{$product->stock == $i ? "selected" : ''}}>{{$i}}</option>
								@endfor
							</select>
							@if ($errors->has('stock'))
								<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('stock') }}</strong>
							</span>
							@endif
						</div>
					</div>

					<br/>
					{{--submit--}}
					<div class="form-group">
						<input type="submit" value="Guardar" class="btn float-right btn-save">
					</div>
				</form>
			</div>{{--card body--}}

			{{--footer--}}
			<div class="card-footer border-light">
				<div class="d-flex justify-content-center login-links">
					<a href="{{url()->previous()}}">
						<button type="button" class="btn btn-outline-warning btn-sm">
							<i class="fas fa-undo-alt"></i> Volver
						</button>
					</a>
				</div>
			</div>{{--card footer--}}

		</div>{{--row--}}


	</div>
{{--	</div>--}}
@endsection
