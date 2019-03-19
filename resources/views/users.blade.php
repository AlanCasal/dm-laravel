@extends('layouts.layout')

@section('title', 'Usuarios')

@section('section')
    @include('components.navbar')
    <ul>
        <br/>
        <a href="{{ route('users.create') }}">Crear nuevo usuario</a>
        <br/>
        <br />

        <li>Listado de Usuarios</li>
        @if(isset($users))
            @foreach ($users as $user)
                <br/>
                {{ $user->id }}. {{ $user->first_name }} {{ $user->last_name }}, {{ $user->email }} -
                <a href="{{ route('users.show', $user->id) }}">Ver Detalle</a>
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
            <a href="{{ route('users.edit', $user->id) }}">Editar</a><br/>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Borrar usuario</button>
            </form>
            <a href="{{ route('users.index') }}">Volver al listado de usuarios</a>

        @else
            No hay usuarios registrados. :(

        @endif
    </ul>

    {{--<div class="container">--}}
    {{--<div class="row"></div>--}}
    {{--</div>--}}
@endsection
