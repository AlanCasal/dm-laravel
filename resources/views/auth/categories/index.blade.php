@extends('layouts.auth')

@section('content')
    <br/>
    <ul style="color: white">
        <h3>CATEGORÍAS</h3>

	    {{--ALERTAS--}}
        @if(isset($data['store']))
            <div class="alert alert-success alert-dismissible text-success fade show col-md-4 offset-md-4 text-center" role="alert">
                <h5>
                    <i class="fas fa-check-circle"></i> CATEGORÍA AGREGADA
                </h5>
                <hr/>
                <p>LA CATEGORÍA <strong>{{$data['store']}}</strong> HA SIDO AGREGADA.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(isset($data['destroy']))
            <div class="alert alert-danger alert-dismissible text-danger fade show col-md-4 offset-md-4 text-center" role="alert">
                <h5>
                    <i class="fas fa-trash-alt"></i> CATEGORÍA ELIMINADA
                </h5>
                <hr>
                <p>LA CATEGORÍA <strong>{{$data['destroy']}}</strong> HA SIDO ELIMINADA.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(isset($data['update']))
            <div class="alert alert-primary alert-dismissible text-primary fade show col-md-4 offset-md-4 text-center" role="alert">
                <h5>
                    <i class="fas fa-sync-alt"></i> CATEGORÍA ACTUALIZADA
                </h5>
                <hr/>
                <p>LA CATEGORÍA <strong>{{$data['update'][0]}}</strong> HA CAMBIADO SU NOMBRE A <strong>{{$data['update'][1]}}</strong>.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

	    {{--CONTENIDO--}}
        <hr style="border-color: #FFC312"/>

        <a href="{{route('categories.create')}}">
            <button class="btn btn-outline-warning">
                Agregar una categoría
            </button>
        </a>
        <br/>
        <br/>

        @forelse($categories as $category)
            <li
                @if(isset($data['store']) && $category->name == $data['store'])
                    class="font-weight-bold font-italic text-success"
                @elseif(isset($data['update'][1]) && $category->name == $data['update'][1])
                    class="font-weight-bold font-italic text-primary"
                @endif
            >
                {{$category->name}},
                <a href="{{route('categories.edit', $category)}}" class="">
                    Editar
                </a>,
                <a href="" class="" onclick="event.preventDefault(); document.getElementById('frm-destroy{{$category->id}}').submit();">
                    Eliminar
                </a>
                <form id="frm-destroy{{$category->id}}" action="{{ route('categories.destroy', $category) }}" method="POST" style="display: none;">
                    @csrf @method('DELETE')
                </form>
            </li>
        @empty
            <li>No se encontraron categorías en la base de datos.</li>
        @endforelse
    </ul>
@endsection
