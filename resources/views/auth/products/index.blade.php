@extends('layouts.auth')

@section('content')
    <br/>
    <ul style="color: white">
        <h3>PRODUCTOS</h3>

        {{--ALERTAS--}}
        @if(isset($data['store']))
            <div class="alert alert-success alert-dismissible text-success fade show col-md-4 offset-md-4 text-center" role="alert">
                <h5>
                    <i class="fas fa-check-circle"></i> PRODUCTO AGREGADO
                </h5>
                <hr/>
                <p>EL PRODUCTO <strong>{{$data['store']}}</strong> HA SIDO AGREGADO.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(isset($data['destroy']))
            <div class="alert alert-danger alert-dismissible text-danger fade show col-md-4 offset-md-4 text-center" role="alert">
                <h5>
                    <i class="fas fa-trash-alt"></i> PRODUCTO ELIMINADO
                </h5>
                <hr>
                <p>EL PRODUCTO <strong>{{$data['destroy']}}</strong> HA SIDO ELIMINADO.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(isset($data['update']))
            <div class="alert alert-primary alert-dismissible text-primary fade show col-md-4 offset-md-4 text-center" role="alert">
                <h5>
                    <i class="fas fa-sync-alt"></i> PRODUCTO ACTUALIZADO
                </h5>
                <hr/>
                <ul>
                    <li>NOMBRE: {{$data['update'][0]}} > <strong>{{$data['update'][1]}}</strong></li>
                    <li>PRECIO: ${{$data['update'][2]}} > <strong>${{$data['update'][3]}}</strong></li>
                    <li>CATEGORÍA: {{$data['update'][4]}} > <strong>{{$data['update'][5]}}</strong></li>
                    <li>STOCK: {{$data['update'][6]}} > <strong>{{$data['update'][7]}}</strong></li>
                    <li>ACTIVO: {{$data['update'][8]}} > <strong>{{$data['update'][9]}}</strong></li>
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {{--CONTENIDO--}}
        <hr style="border-color: #FFC312"/>

        <a href="{{route('products.create')}}">
            <button class="btn btn-outline-warning">
                Agregar un producto
            </button>
        </a>
        <br/>
        <br/>

        @forelse($products as $product)
            <li
                @if(isset($data['store']) && $product->name == $data['store'])
                    class="font-weight-bold font-italic text-success"
                @elseif(isset($data['update'][1]) && $product->name == $data['update'][1])
                    class="font-weight-bold font-italic text-primary"
                @endif
            >
                {{$product->id}}. {{$product->category->name}} - {{$product->name}} - ${{$product->price}} -
                <a href="{{route('products.edit', $product)}}" class="">
                    Editar
                </a>,
                <a href="" class="" onclick="event.preventDefault(); document.getElementById('frm-destroy{{$product->id}}').submit();">
                    Eliminar
                </a>
                <form id="frm-destroy{{$product->id}}" action="{{ route('products.destroy', $product) }}" method="POST" style="display: none;">
                    @csrf @method('DELETE')
                </form>
            </li>
        @empty
            <li>No se encontraron productos en la base de datos.</li>
        @endforelse
    </ul>
@endsection
