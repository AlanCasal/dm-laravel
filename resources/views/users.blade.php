@extends('layouts.layout')

@section('title', 'users list')

@section('section')
    @include('components.navbarAdmin')

    <ul>
        @foreach ($users as $user)
            <li>{{ $user->first_name }} {{ $user->last_name }}, {{ $user->email }}</li>
        @endforeach
    </ul>

    {{--<div class="container">--}}
    {{--<div class="row"></div>--}}
    {{--</div>--}}
@endsection
