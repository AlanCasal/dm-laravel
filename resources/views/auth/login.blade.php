@extends('layouts.layout')

@section('title', 'Ingresar - Dragon Market - Equipos y Componentes para Gamers')

@section('content')
    <div class="container big-container">
        <div class="d-flex justify-content-center h-100">
            <div class="login_card card">
                <div class="card-header card-header-login">
                    <h3>Ingresar</h3>
                    <div class="d-flex justify-content-end login_social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="input-group form-group">
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}
                            <div class="input-group-prepend login-igp">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Ingresá tu email" required autofocus>
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

                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Ingresá tu contraseña" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group row text-light">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Recordar mi usuario
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Ingresar" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-center login-links">
                        @if (Route::has('password.request'))
                            Si olvidaste tu contraseña
                            <a href="{{ route('password.request') }}">
                                Ingresá acá
                            </a>
                        @endif
                    </div>
                    <div class="d-flex justify-content-center login-links">
                        Si no tenés una cuenta<a href="{{ route('users.create') }}">Registrate acá</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
