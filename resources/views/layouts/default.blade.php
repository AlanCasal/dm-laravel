<!DOCTYPE html>
<html lang="en">

<head>
	@include('components/head')
</head>

<body>
	<div class="page-wrapper chiller-theme toggled">

		@include('components/navbar')

		@include('sidebar')

		<main class="page-content">
			@yield('section')

			@include('components/footer')
		</main>

		@include('components/scripts')
	</div> {{-- wrapper --}}
</body>

</html>
