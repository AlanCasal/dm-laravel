@extends('layouts.layout')

@section('title', 'Admin - Categorías')

@section('section')
    @include('components.navbar')

    <br/>
    <ul>
        @forelse($categories as $category)
            <li>
                {{ $category }}
            </li>
        @empty
        @endforelse
    </ul>

@endsection
