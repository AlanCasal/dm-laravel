<!DOCTYPE html>
<html lang="en">

<head>
	@include('components.head')
</head>

<body>
    @include('components.users.header')

	@yield('content')

	@include('components.scripts')
</body>

</html>
