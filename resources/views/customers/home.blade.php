@extends('layouts.customers')

@section('content')
    @include('components.customers.navbar')
    @include('components.customers.carousel1')

	<div class="container">
		<div class="row">
			@include('components.customers.products1')
			@include('components.customers.products2')
		</div> {{-- row --}}
	</div> {{-- container --}}

	@include('components.customers.carousel2')
@endsection
