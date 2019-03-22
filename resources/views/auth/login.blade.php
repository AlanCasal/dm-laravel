@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
            <div class="login_card card col-md-4">
                <div class="card-header card-header-login">
                    <h3>Ingresar a Intranet</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="input-group form-group">
                            {{--<label for="username" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}
                            <div class="input-group-prepend login-igp">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Ingresá tu usuario" autofocus>
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
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
                </div>
            </div>
        </div>
    </div>
@endsection
