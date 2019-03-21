@extends('layouts.users')

@section('content')
    @include('components.navbar')
    @include('components.carousel1')

	<div class="container">
		<div class="row">
			@include('components.products1')
			@include('components.products2')
		</div> {{-- row --}}
	</div> {{-- container --}}

	@include('components.carousel2')
@endsection
