<nav class="navbar navbar-expand-md fixed-top" id="navbar-edit">
	<div class="container">

		{{-- Logo --}}
		<a class="navbar-brand" href="#">
			<img src='{{asset("img/DMHead.png")}}' alt='Logo' style='width: 50px;'>
			<img src='{{asset("img/DMText.png")}}' alt='Logo' style='width: 200px;'>
		</a>

		{{-- Boton toggler responsive --}}
		<button type="button" class="navbar-toggler" data-toggle='collapse' data-target='#navbarSupportedContent'>
			<span class="navbar-toggler-icon"></span>
		</button>

		{{-- Contenido a colapsar --}}
		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			{{-- Search box --}}
			<div class="row no-gutters ml-auto col-lg-6">
				<div class="col">
					<input class="form-control form-control-no-border border-info border-right-0 rounded-0" type="search" value="" placeholder="Buscar productos...">
				</div>
				<div class="col-auto">
					<button class="btn btn-outline-info border-left-0 rounded-0 rounded-right search-btn noBoxShadow-btn" type="button">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>

			{{-- Botones --}}
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="#" class="nav-link"><i class="fas fa-shopping-cart"></i> (0)</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link"><i class="fas fa-user-edit"></i> Registrarse</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link"><i class="fas fa-question-circle"></i> Ayuda</a>
				</li>
			</ul>

		</div>
	</div>
</nav>
