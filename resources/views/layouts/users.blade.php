<!DOCTYPE html>
<html lang="en">

<head>
	@include('components.head')
</head>

<body>
    @include('components.header')

	@yield('content')

	@include('components.footer')

	@include('components.scripts')
</body>

</html>
