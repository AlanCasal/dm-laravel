@extends('layouts.admin')

@section('content')
    <br/>
    <ul style="color: white">
        <h3>Categorías</h3>
        @forelse($categories as $category)
            <li> {{ $category }} </li>

        @empty
            <li>No se encontraron categorías en la base de datos.</li>

        @endforelse
    </ul>
@endsection
