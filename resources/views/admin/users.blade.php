@extends('layouts.admin')

@section('content')
    <ul style="color: white;">
        @if(isset($users))
            <h3>Usuarios</h3>
            <br/>
            <a href="{{ route('users.create') }}">Crear nuevo usuario</a>
            <br/>
            <br/>
            <li>Listado de Usuarios</li>
            @foreach ($users as $user)
                <br/>
                {{ $user->id }}. {{ $user->username }}, {{ $user->email }} -
                <a href="{{ route('users.show', $user->id) }}">Ver Detalle</a>
            @endforeach

            <br/><br/>
            {{ $users->links() }}

        @elseif(isset($user))
            <h3>Detalles de usuario</h3>
            <li>Usuario: {{ $user->username }}</li>
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
                <button type="submit" class="btn btn-link" style="font-size: 1em">Borrar usuario</button>
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
