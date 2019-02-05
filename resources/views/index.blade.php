@extends('layouts.default')

@section('title', 'HOME - Dragon Market - Equipos y Componentes para Gamers')

@section('section')
	@include('components/carousel1')

	<div class="container">
		<div class="row">
			@include('components/categories')

			@include('components/products1')
			@include('components/products2')

		</div> {{-- row --}}
	</div> {{-- container --}}

	@include('components/carousel2')
@endsection
