@extends('layouts.auth')

@section('content')

    <ul style="color: white; margin-top: 3em">
        <h3>Menu principal</h3>
        <hr class="border-warning">
        <li><a href="{{route('users.index')}}">Usuarios</a></li>
        <li><a href="{{route('categories.index')}}">Categorías</a></li>
        <li><a href="{{route('products.index')}}">Productos</a></li>
        <li><a href="">Ventas concretadas</a></li>
    </ul>
@endsection
