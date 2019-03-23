<!DOCTYPE html>
<html lang="en">

<head>
	@include('components.head')
</head>

<body>
    @include('components.customers.header')

	@yield('content')

	@include('components.customers.footer')

	@include('components.scripts')
</body>

</html>
