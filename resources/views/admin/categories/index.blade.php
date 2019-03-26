@extends('layouts.admin')

@section('content')
    <br/>
    <ul style="color: white">
        <h3>CATEGORÍAS</h3>
        
        @if(isset($storeOrDestroy['store']))
            <li class="text-success">
                <h6 class="font-italic">
                    LA CATEGORÍA <span class="font-weight-bold font-italic">'{{$storeOrDestroy['store']}}'</span> HA SIDO AGREGADA.
                    <i class="fas fa-check-circle"></i>
                </h6>
            </li>
        @elseif(isset($storeOrDestroy['destroy']))
            <li class="text-danger">
                <h6 class="font-italic">
                    LA CATEGORÍA <span class="font-weight-bold font-italic">'{{$storeOrDestroy['destroy']}}'</span> HA SIDO ELIMINADA.
                    <i class="fas fa-trash-alt"></i>
                </h6>
            </li>
        @endif

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
                @if(isset($storeOrDestroy['store']) && $category == $storeOrDestroy['store'])
                class="font-weight-bold font-italic text-success"
                @endif
            >
                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    {{$category->name}},
                    <button type="submit" class="btn btn-link" style="font-size: 1em">Eliminar</button>
                </form>
            </li>
        @empty
            <li>No se encontraron categorías en la base de datos.</li>
        @endforelse
    </ul>
@endsection
