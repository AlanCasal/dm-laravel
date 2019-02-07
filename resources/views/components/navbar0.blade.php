<nav class="navbar navbar-expand-md navbar-dark fixed-top" id="navbar-edit">
	<div class="container">

		{{-- Logo --}}
		<div class="logoImgs">
			<a class="navbar-brand" href="/">
				<img src='{{asset("img/DMHead.png")}}' alt='Logo' style='width: 50px;'>
				<img class="d-none d-sm-inline-block" src='{{asset("img/DMText.png")}}' alt='Logo' style='width: 200px;'>
			</a>
		</div>

		{{-- Boton toggler responsive --}}
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		{{-- Contenido a colapsar --}}
		<div class="collapse navbar-collapse" id="navbarMenu">

			{{-- Search box --}}
			<div class="searchBox ml-auto col-lg-6 d-none d-lg-inline-block">
				<div class="row no-gutters">
					<div class="col">
						<input class="form-control form-control-no-border border-info border-right-0 rounded-0" type="search" value="" placeholder="Buscar productos...">
					</div>
					<div class="col-auto">
						<button class="btn btn-outline-info border-left-0 rounded-0 rounded-right search-btn noBoxShadow-btn" type="button">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</div>
			</div>

			{{-- Botones --}}
			<div class="menuBotones">
				<ul class="navbar-nav ml-auto flex-row">
					<li class="nav-item d-inline-block d-lg-none">
						<a href="#" class="nav-link"><i class="fas fa-search fa-lg"></i></a>
					</li>
					<li class="nav-item ml-auto">
						<a href="#" class="nav-link d-none d-lg-inline-block"><i class="fas fa-shopping-cart"></i> (0)</a>
						<a href="#" class="nav-link d-inline-block d-lg-none"><i class="fas fa-shopping-cart fa-lg"></i> (0)</a>

					</li>
					<li class="nav-item ml-auto">
						<a href="#" class="nav-link d-none d-lg-inline-block"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
						<a href="#" class="nav-link d-inline-block d-lg-none"><i class="fas fa-sign-in-alt fa-lg"></i></a>
					</li>
					<li class="nav-item ml-auto">
						<a href="#" class="nav-link d-none d-lg-inline-block"><i class="fas fa-user-edit"></i> Registrarse</a>
						<a href="#" class="nav-link d-inline-block d-lg-none"><i class="fas fa-user-edit fa-lg"></i></a>
					</li>
					<li class="nav-item ml-auto">
						<a href="/ayuda" class="nav-link d-none d-lg-inline-block"><i class="fas fa-question-circle"></i> Ayuda</a>
						<a href="#" class="nav-link d-inline-block d-lg-none"><i class="fas fa-question-circle fa-lg"></i></a>
					</li>
				</ul>
			</div>

		</div> {{-- collapse --}}
	</div> {{-- container --}}
</nav>