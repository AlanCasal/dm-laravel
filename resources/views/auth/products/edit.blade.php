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

					<div class="input-group form-group">
						<div class="input-group-prepend login-igp">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
						       name="description" value="{{ old('description') }}" placeholder="{{old('description', $product->description)}}" autofocus>
						@if ($errors->has('description'))
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
						@endif
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend login-igp">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input id="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
						       name="price" value="{{ old('price') }}" placeholder="{{old('price', $product->price)}}">
						@if ($errors->has('price'))
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
						@endif
					</div>

					<div class="input-group">
						<div class="input-group-prepend login-igp">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
							<select class="custom-select">
								<option  value="">Seleccioná una categoría</option>
								@foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							</select>
							@if ($errors->has('price'))
								<span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('price') }}</strong>
	                            </span>
							@endif
						</div>
					</div>

					{{--<div class="custom-file">--}}
						{{--<input type="file" class="custom-file-input" id="customFileLang" lang="es">--}}
						{{--<label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>--}}
					{{--</div>--}}
					{{----}}
					{{--<div class="invalid-feedback">Example invalid custom file feedback</div>--}}
					{{--@if ($errors->has('price'))--}}
						{{--<span class="invalid-feedback" role="alert">--}}
                            {{--<strong>{{ $errors->first('price') }}</strong>--}}
                        {{--</span>--}}
					{{--@endif--}}
					{{--<br/><br/>--}}

					<div class="form-row">
						{{--<div class="col-3 custom-control-inline text-light">--}}
							{{--<input type="number" class="form-control" placeholder="{{old('stock', $product->stock)}}">--}}
						{{--</div>--}}
						<div class="col-auto my-1">
							<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
								<option selected>Cantidad...</option>
								@for ($i = 0; $i < 100; $i++)
									<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>
						</div>

						<div class="custom-control custom-radio custom-control-inline offset-md-1 align-items-center">
							<input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
							<label class="custom-control-label text-light" for="customRadioInline1">Activo</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline align-items-center">
							<input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
							<label class="custom-control-label text-light" for="customRadioInline2">Inactivo</label>
						</div>

					</div>

					<div class="form-group">
						<input type="submit" value="Guardar" class="btn float-right login_btn">
					</div>
				</form>
			</div>

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
