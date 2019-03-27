<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	@include('components.head')
</head>

<body>
    @include('components.auth.header')

	@yield('content')

	@include('components.scripts')
</body>

</html>
