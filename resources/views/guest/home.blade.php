@extends('layouts.guest')

@section('content')
    @include('components.guest.navbar')
    @include('components.guest.carousel1')

	<div class="container">
		<div class="row">
			@include('components.guest.products1')
			@include('components.guest.products2')
		</div> {{-- row --}}
	</div> {{-- container --}}

	@include('components.guest.carousel2')
@endsection
