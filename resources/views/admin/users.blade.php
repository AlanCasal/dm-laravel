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
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <br/>
                    {{ $user->id }}. {{ $user->username }} | {{ $user->email }} |
                     @if($user->is_admin) {{ 'Administrador |' }}
                     @else {{ 'Usuario |' }}
                     @endif
                    <button type="submit" class="btn btn-link" style="font-size: 1em">Borrar usuario</button>
                </form>
            @endforeach

        @else
            No hay usuarios registrados. :(

        @endif
    </ul>

    {{--<div class="container">--}}
    {{--<div class="row"></div>--}}
    {{--</div>--}}
@endsection
