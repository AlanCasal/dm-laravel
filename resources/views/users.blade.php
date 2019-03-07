@extends('layouts.layout')

@section('title', 'Usuarios')

@section('section')
    @include('components.navbar')
    <ul>
        @if(isset($users))
            @foreach ($users as $user)
                <br/>
                {{ $user->id }}. {{ $user->first_name }} {{ $user->last_name }}, {{ $user->email }} -
                <a href="{{ route('users.show', ['id' => $user->id]) }}">Ver Detalle</a>
            @endforeach

            <br/><br/>
            {{ $users->links() }}

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

        @else
            No hay usuarios registrados. :(

        @endif
    </ul>

    {{--<div class="container">--}}
    {{--<div class="row"></div>--}}
    {{--</div>--}}
@endsection
