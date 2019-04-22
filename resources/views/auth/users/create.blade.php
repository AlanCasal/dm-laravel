@extends('layouts.auth')

@section('content')
	<div class="container big-container">
		<div class="d-flex justify-content-center h-100">
			<div class="login_card card col-5">
				<div class="card-header card-header-login">
					<h3>Crear nuevo usuario</h3>
				</div>
				<div class="card-body">
					<form method="POST" action="{{ route('users.store') }}">
						@csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend login-igp">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Ingresá tu nuevo usuario" autofocus>
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="input-group form-group">
							{{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}
							<div class="input-group-prepend login-igp-disabled">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input id="email" type="text" class="form-control" name="email" value="{{ old('username') }}" placeholder="" disabled>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">@dragonmarket.com.ar</span>
                            </div>
                            @if ($errors->has('email'))
								<span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
							@endif
						</div>

						<div class="input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>

							<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Ingresá tu contraseña">
							@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
							@endif
						</div>

						<div class="input-group form-group">
							<div class="input-group-prepend login-igp">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>

							<input id="password-confirm" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Confirmá tu contraseña">
							@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
							@endif
						</div>

						<div class="form-group">
							<input id="submit" type="submit" value="Registrar" class="btn float-right btn-save">
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