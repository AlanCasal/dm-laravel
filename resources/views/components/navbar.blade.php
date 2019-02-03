<div class='container-fluid' style="margin-bottom: 100px;">
	<nav class='navbar navbar-expand-md fixed-top navbar-light navbar-custom' >
		<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbar5'>
			<span class='navbar-toggler-icon'></span>
		</button>
		<a class='navbar-brand' href='/'>
			<img src="{{ asset('/img/DMHead.png') }}" alt='Logo' style='width: 50px;'>
		</a>
		<div class='navbar-collapse collapse justify-content-stretch' id='navbar5'>
			<div style='color: white;'>
				<ul class='navbar-nav'>
					<li class='nav-item'>
						<a class='nav-link' href='/logInToShop'>
							<i class="fas fa-shopping-cart"></i> (0)
						</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='/login'>
							<i class="fas fa-sign-in-alt"></i> Ingreso
						</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='/register'>
							<i class="fas fa-user-edit"></i> Registro
						</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='/faq'>
							<i class="fas fa-question-circle"></i> FAQ
						</a>
					</li>
				</ul>
			</div>
			<form class="form-inline" action='/showProducts' style="margin-left: auto;">
				@csrf
				<div class="form-group has-buscar">
					<input class='form-control' type='text' name='txt' placeholder='Buscar productos ...'>
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">
						<i class="fas fa-search"></i>
					</button>
				</div>
			</form>
		</div>
	</nav>
</div>
