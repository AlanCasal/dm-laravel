@extends('layouts.admin')

@section('content')
    <br/>
    <div class="container big-container">
        <div class="d-flex justify-content-center h-100">
            <div class="login_card card col-5">
                <div class="card-header card-header-login">
                    <h3>Editar categoría</h3>
                </div>
                <div class="card-body">
                    <h6 class="font-weight-bold text-light">Ingrese un nuevo nombre para la categoría</h6>
                    <form method="POST" action="{{ route('categories.update', $category) }}">
                        @csrf @method('PUT')
                        <div class="input-group form-group">
                            <div class="input-group-prepend login-igp">
                                <span class="input-group-text"><i class="fas fa-edit"></i></span>
                            </div>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{$category->name}}" autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <div class="input-group-append">
                                <input type="submit" value="Guardar" class="btn float-right login_btn">
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
