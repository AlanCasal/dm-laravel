@extends('layouts.guests')

@section('content')
    @include('components.guests.navbar')
    @include('components.guests.carousel1')

	<div class="container">
		<div class="row">
			@include('components.guests.products1')
			@include('components.guests.products2')
		</div> {{-- row --}}
	</div> {{-- container --}}

	@include('components.guests.carousel2')
@endsection
