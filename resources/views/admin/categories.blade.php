@extends('layouts.admin')

@section('content')
    <br/>
    <div class="container big-container">
        <div class="d-flex justify-content-center h-100">
            <div class="login_card card col-5">
                <div class="card-header card-header-login">
                    <h3>Agregar una categoría</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="input-group form-group">
                            {{--<div class="input-group-prepend login-igp">--}}
                                {{--<span class="input-group-text"><i class="fas fa-user"></i></span>--}}
                            {{--</div>--}}
                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Nueva categoría" autofocus>
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        <div class="input-group-append">
                            <input type="submit" value="Agregar" class="btn float-right login_btn">
                        </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <ul style="color: white">
        <h3>Categorías</h3>
        @forelse($categories as $category)
            <li> {{ $category }} </li>

        @empty
            <li>No se encontraron categorías en la base de datos.</li>

        @endforelse
    </ul>
@endsection
