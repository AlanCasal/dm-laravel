<div class='container-fluid' style="margin-bottom: 80px;">
	<nav class='navbar navbar-expand-md fixed-top navbar-light navbar-custom' >
		<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbar5'>
			<span class='navbar-toggler-icon'></span>
		</button>
		<a class='navbar-brand' href='/'>
			<img src="{{ asset('/img/DMHead.png') }}" alt='Logo' style='width: 50px;'>
		</a>
		<div class='navbar-collapse collapse justify-content-stretch' id='navbar5'>
			@php
			$botones = array(
				'cart'     => array('/logInToShop', 'fas fa-shopping-cart', '(0)'),
				'login'    => array('/login', 'fas fa-sign-in-alt', 'Ingreso'),
				'register' => array('/register', 'fas fa-user-edit', 'Registro'),
				'faq'      => array('/faq', 'fas fa-question-circle', 'FAQ')
			);
			@endphp

			<div style='color: white;'>
				<ul class='navbar-nav'>
					@foreach ($botones as $boton => $value)
						<li class='nav-item'>
							<a class='nav-link' href="{{$value[0]}}">
								<i class="{{$value[1]}}"></i> {{$value[2]}}
							</a>
						</li>
					@endforeach
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
