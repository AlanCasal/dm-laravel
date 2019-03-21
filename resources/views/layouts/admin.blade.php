<!DOCTYPE html>
<html lang="en">

<head>
	@include('components.head')
</head>

<body>
    @if (auth()->user())
        @include('components.users.header')
    @endif

	@yield('content')

	@include('components.scripts')
</body>

</html>
