@extends('layouts.layout')

@section('title', 'users list')

@section('section')
    @include('components.navbarAdmin')

    <ul>
        @if (isset($users))
            @forelse ($users as $user)
                <li>{{ $user->first_name }} {{ $user->last_name }}, {{ $user->email }} -
                    <a href="{{ route('users.show', ['id' => $user->id]) }}">Ver Detalle</a>
                </li>
            @empty
                <li>No hay usuarios registrados. :(</li>
            @endforelse

        @elseif(isset($user))
            <li>Nombre: {{ $user->first_name }}</li>
            <li>Apellido: {{ $user->last_name }}</li>
            <li>email: {{ $user->email }}</li>
            <li>Tipo de cuenta:
                @if($user->is_admin) Administrador
                @else Usuario
                @endif
            </li>
            <a href="{{ url()->previous() }}">Volver</a>
        @endif

        {{--@foreach ($users as $user)--}}
            {{--<li>{{ $user->first_name }} {{ $user->last_name }}, {{ $user->email }} ---}}
                {{--<a href="{{ url("/users/{$user->id}") }}">Ver Detalle</a>--}}
            {{--</li>--}}
        {{--@endforeach--}}
    </ul>

    {{--<div class="container">--}}
    {{--<div class="row"></div>--}}
    {{--</div>--}}
@endsection
