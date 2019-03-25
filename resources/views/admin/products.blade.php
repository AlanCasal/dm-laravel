@extends('layouts.admin')

@section('content')
    <ul style="color: white">
        <h3>Productos</h3>

        {{--@if(isset($products))--}}
            {{--@foreach($products as $product)--}}
                {{--<li>{{ $product->category->name }} - {{ $product->description }} - $ {{ $product->price }} ---}}
                    {{--<a href="">Editar</a> ---}}
                    {{--<a href="">Eliminar</a>--}}
                {{--</li>--}}
            {{--@endforeach--}}
            {{--<br/>--}}
            {{--{{ $products->links() }}--}}

            {{--@else--}}
                {{--<center>No se encontraron productos en la base de datos.</center>--}}
        {{--@endif--}}
    </ul>
@endsection
