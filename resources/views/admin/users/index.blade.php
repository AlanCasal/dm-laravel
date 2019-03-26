@extends('layouts.admin')

@section('content')
    <ul style="color: white;">
        @if(isset($users))
            <h3>Usuarios</h3>
            <hr style="border-color: #FFC312"/>
            <a href="{{route('users.create')}}">
                <button class="btn btn-outline-warning">
                    Agregar un usuario
                </button>
            </a>
            <br/>
            <br/>
            @foreach ($users as $user)
                <li>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    {{ $user->id }}. {{ $user->username }}, {{ $user->email }},
                     @if($user->is_admin) {{ 'Administrador' }},
                     @else {{ 'Usuario' }},
                     @endif
                    <button type="submit" class="btn btn-link" style="font-size: 1em">Eliminar</button>
                    </form>
                </li>
            @endforeach
        @else
            No hay usuarios registrados. :(
        @endif
    </ul>
@endsection
