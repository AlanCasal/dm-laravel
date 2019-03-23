<div class="navbar navbar-expand-md navbar-dark" id="navbar-edit">
    <div class="container-fluid d-flex flex-column">
        <div class="container-fluid d-flex flex-row">

            {{-- Logo --}}
            <div class="logoImg">
                <a class="navbar-brand" href="{{ route('home') }}">
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
                            <p class="nav-link d-none d-lg-inline-block" style="color: white"><i class="fas fa-user"></i> {{auth()->user()->username}}</p>
                            <p class="nav-link d-inline-block d-lg-none"><i class="fas fa-user"></i>{{auth()->user()->username}}</p>
                        </li>
                        <li class="nav-item ml-auto">
                            <a href="{{ route('menu')}}" class="nav-link d-none d-lg-inline-block activeLink"><i class="fas fa-list"></i> Menú principal</a>
                            <a href="{{ route('menu') }}" class="nav-link d-inline-block d-lg-none activeLink"><i class="fas fa-list"></i></a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li class="nav-item ml-auto">
                            <a href="{{ route('logout')}}" class="nav-link d-none d-lg-inline-block activeLink" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                            <a href="{{ route('logout') }}" class="nav-link d-inline-block d-lg-none activeLink" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i></a>
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
