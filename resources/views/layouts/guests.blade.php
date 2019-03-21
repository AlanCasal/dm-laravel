<!DOCTYPE html>
<html lang="en">

<head>
	@include('components.head')
</head>

<body>
    @include('components.guests.header')

	@yield('content')

	@include('components.guests.footer')

	@include('components.scripts')
</body>

</html>
