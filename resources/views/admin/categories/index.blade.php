@extends('layouts.admin')

@section('content')
    <br/>
    <ul style="color: white">
        <h3>CATEGORÍAS</h3>
        @if ($newCategory != null)
            <li class="text-success">
                <h6 class="font-italic">
                    LA CATEGORÍA <span class="font-weight-bold font-italic">'{{$newCategory}}'</span> HA SIDO AGREGADA!
                    <i class="fas fa-check-circle"></i>
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
        @forelse($categories as $id => $category)
            <li
                @if($category == $newCategory)
                class="font-weight-bold font-italic text-success"
                @endif
            >
                <form action="{{ route('categories.destroy', $id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    {{ $category }},
                    <button type="submit" class="btn btn-link" style="font-size: 1em">Eliminar</button>
                </form>
            </li>
        @empty
            <li>No se encontraron categorías en la base de datos.</li>
        @endforelse
    </ul>
@endsection
