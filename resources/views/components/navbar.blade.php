@isset($activeCategories)
<nav class="navbar navbar-expand-sm sticky-top navbar-dark d-none d-lg-block" id="sticky-nav">
	<div class="container-fluid">
		<div class="menuBotones container-fluid">

			<ul class="justify-content-center nav">
				@foreach($activeCategories as $category)
				<li class="nav-item">
					<a href="#" class="nav-link d-inline-block" style="font-size: 1.3em"><strong>{{ $category->name }}</strong></a>
				</li>
				@endforeach
			</ul>

		</div>
	</div>
</nav>
@endisset
