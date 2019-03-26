@isset($navbarItems)
<nav class="navbar navbar-expand-sm sticky-top navbar-dark d-none d-lg-block" id="sticky-nav">
	<div class="container-fluid">
		<div class="menuBotones container-fluid">

			<ul class="justify-content-center nav">
				@foreach($navbarItems as $navbarItem)
				<li class="nav-item">
					<a href="#" class="nav-link d-inline-block" style="font-size: 1.3em"><strong>{{$navbarItem}}</strong></a>
				</li>
				@endforeach
			</ul>

		</div>
	</div>
</nav>
@endisset
