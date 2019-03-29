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
						       name="name" value="{{ old('name', $product->name) }}"
						       placeholder="{{old('name', $product->name)}}" autofocus>
						@if ($errors->has('name'))
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
						@endif
					</div>

					{{--precio--}}
					{{--<div class="input-group form-group">
						<div class="input-group-prepend login-igp">
							<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
						</div>
						<input id="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
						       name="price" value="{{ old('price', $product->price) }}"
						       placeholder="{{old('price', $product->price)}}">
						@if ($errors->has('price'))
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
						@endif
					</div>

					categoría
					<div class="input-group form-group">
						<div class="input-group-prepend login-igp">
							<span class="input-group-text"><i class="fas fa-tag"></i></span>
						</div>
						<select class="custom-select">
							<option value="{{old('category')}}">Seleccioná una categoría</option>
							@foreach($categories as $category)
								<option value="{{$category->id}}" {{($product->category->id == $category->id ? "selected" : "")}}>{{$category->name}}</option>
							@endforeach
						</select>
						@if ($errors->has('category_id'))
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
						@endif
					</div>

					imagen
					<div class="input-group form-group">
						<div class="input-group-prepend login-igp">
							<span class="input-group-text"><i class="fas fa-image"></i></span>
						</div>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="customFileLang" lang="es" disabled>
							<label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
						</div>
						@if ($errors->has('price'))
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
						@endif
					</div>



					cant en stock
					<div class="form-row">
						<div class="col-md-4 my-1 input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
							</div>
							<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
								<option selected>Cantidad...</option>
								@for ($i = 0; $i < 100; $i++)
									<option value="{{$i}}" {{($i == $product->stock ? "selected" : "")}}>{{$i}}</option>

								@endfor
							</select>
						</div>

						activo o inactivo
						<div class="custom-control custom-radio custom-control-inline offset-md-1 align-items-center">
							<input type="radio" id="customRadioInline1" name="customRadioInline1"
							       class="custom-control-input"
							       checked>
							<label class="custom-control-label text-light" for="customRadioInline1">Activo</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline align-items-center">
							<input type="radio" id="customRadioInline2" name="customRadioInline1"
							       class="custom-control-input">
							<label class="custom-control-label text-light" for="customRadioInline2">Inactivo</label>
						</div>--}}
					</div>{{--row--}}

					{{--submit--}}
					<div class="form-group">
						<input type="submit" value="Guardar" class="btn float-right login_btn">
					</div>
				</form>

			</div> {{--card body--}}

			<div class="card-footer border-light">
				<div class="d-flex justify-content-center login-links">
					<a href="{{url()->previous()}}">
						<button type="button" class="btn btn-outline-warning btn-sm">
							<i class="fas fa-undo-alt"></i> Volver
						</button>
					</a>
				</div>
			</div>


		</div>
	</div>
@endsection
