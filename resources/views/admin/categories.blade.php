@extends('layouts.users')

@section('title', 'Admin - Categorías')

@section('content')
    @include('components.navbar')

    <br/>
    <ul>
        @forelse($categories as $category)
            <li> {{ $category }} </li>

        @empty
            <li>No se encontraron categorías en la base de datos.</li>

        @endforelse
    </ul>

@endsection
