@extends('layouts.layout')

@section('title', 'Admin - Productos')

@section('section')
    @include('components.navbar')
    <br/>

    <div>

    </div>

    <ul>
        @if(isset($products))
            @foreach($products as $product)
                <li>{{ $product->category->name }} - {{ $product->description }} - $ {{ $product->price }} -
                    <a href="">Editar</a> -
                    <a href="">Eliminar</a>
                </li>
            @endforeach
            <br/>
            {{ $products->links() }}

            @else
                <center>No se encontraron productos en la base de datos.</center>
        @endif
    </ul>
@endsection
