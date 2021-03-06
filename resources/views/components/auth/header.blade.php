<div class="navbar navbar-expand-md navbar-dark" id="navbar-edit">
    <div class="container-fluid d-flex flex-column">
        <div class="container-fluid d-flex flex-row">

            {{-- Logo --}}
            <div class="logoImg">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src='{{asset("img/DMHead.png")}}' alt='Logo' style='width: 50px;'>
                    <img class="d-none d-sm-inline-block" src='{{asset("img/DMText.png")}}' alt='Logo' style='width: 200px;'>
                </a>
            </div>

            {{-- Boton toggler responsive --}}
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @if (auth()->user())
            {{-- Contenido a colapsar --}}
            <div class="collapse navbar-collapse" id="navbarMenu">
                {{-- Botones --}}
                <div class="menuBotones ml-auto">
                    <ul class="navbar-nav flex-row mt-4">
	                    <li class="nav-item ml-auto">
		                    {{--<span class="navbar-brand mb-0 h1">Navbar</span>--}}
		                    <span class="navbar-brand h1 nav-link d-none d-lg-inline-block" style="color: #FFC312"><i class="fas fa-user"></i> {{auth()->user()->username}}</span>
		                    {{--<span class="navbar-brand mb-0 h1 nav-link d-inline-block d-lg-none"><i class="fas fa-user"></i>{{auth()->user()->username}}</span>--}}
	                    </li>
	                    @if(auth()->user()->is_admin)
		                    <li class="nav-item activeLink">
			                    <a class="nav-link activeLink" href="{{route('users.index')}}">
				                    Usuarios
			                    </a>
		                    </li>
						@endif
	                    <li class="nav-item ">
		                    <a class="nav-link activeLink" href="{{route('categories.index')}}">
			                    Categorías
		                    </a>
	                    </li>
	                    <li class="nav-item dropdown">
		                    <a class="nav-link activeLink" href="{{route('products.index')}}">
			                    Productos
		                    </a>
	                    </li>
	                    {{--<li>
	                        <a href="{{ route('menu') }}" class="nav-link d-inline-block d-lg-none activeLink"><i class="fas fa-list"></i></a>
	                    </li>--}}
	                    <li>
	                        <a href="" class="nav-link d-none d-lg-inline-block activeLink" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i> Salir</a>
	                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
		                        @csrf
	                        </form>
	                    </li>

                    </ul>
                </div>
            </div>
            @endif
        </div> {{-- collapse --}}
    </div> {{-- container --}}
</div>
