<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	@include('components.head')
</head>

<body>
    @include('components.guest.header')

	@yield('content')

	@include('components.guest.footer')

	@include('components.scripts')
</body>

</html>
