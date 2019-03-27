@extends('layouts.guest')

@section('title', 'Error 404')

@section('content')
	<h1><center>404<br/>Página no encontrada</center></h1>
	<h5><center><a href="{{ url()->previous() }}">Volver</a></center></h5>
@endsection
