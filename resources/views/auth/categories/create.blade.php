@extends('layouts.auth')

@section('content')
	<br/>
	<div class="container big-container">
		<div class="d-flex justify-content-center h-100">
			<div class="login_card card col-5">
				<div class="card-header card-header-login">
					<h3>Agregar una categoría</h3>
				</div>
				<div class="card-body">
					<form method="POST" action="{{ route('categories.store') }}">
						@csrf
						<div class="input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-list-ul"></i></span>
							</div>
							<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nueva categoría" autofocus>
							@if ($errors->has('name'))
								<span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
							@endif
							<div class="input-group-append">
								<input type="submit" value="Agregar" class="btn float-right login_btn">
							</div>
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
	</div>
@endsection
