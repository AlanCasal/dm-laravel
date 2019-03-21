<!DOCTYPE html>
<html lang="en">

<head>
	@include('components.head')
</head>

<body>
	<div class="container mt-5">
		<div class="d-flex justify-content-center">
			<a class="navbar-brand" href="{{ route('home') }}">
				<img src='{{asset("img/DMHead.png")}}' alt='Logo' style='width: 150px;'>
				<img class="d-none d-sm-inline-block" src='{{asset("img/DMText.png")}}' alt='Logo' style='width: 400px;'>
			</a>
		</div>
	</div>

	@yield('content')

	@include('components.scripts')
</body>

</html>
