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


            {{-- Contenido a colapsar --}}
            <div class="collapse navbar-collapse" id="navbarMenu">

                {{-- Search box --}}
                <div class="searchBox ml-auto col-lg-8 d-none d-lg-inline-block">
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
                <div class="menuBotones ml-auto">
                    {{-- <ul class="navbar-nav flex-row">
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
                    </ul> --}}

                    <ul class="navbar-nav flex-row">
                        <li class="nav-item ml-auto">
                            <a href="{{ route('users.index') }}" class="nav-link d-none d-lg-inline-block"><i class="fas fa-user"></i> Usuarios</a>
                            <a href="{{ route('users.index') }}" class="nav-link d-inline-block d-lg-none"><i class="fas fa-user fa-lg"></i></a>
                        </li>
                        <li class="nav-item ml-auto">
                            <a href="{{ route('categories.index') }}" class="nav-link d-none d-lg-inline-block"><i class="fas fa-list-ol"></i> Categorías</a>
                            <a href="{{ route('categories.index') }}" class="nav-link d-inline-block d-lg-none"><i class="fas fa-list-ol fa-lg"></i></a>
                        </li>
                        <li class="nav-item ml-auto">
                            <a href="{{ route('products.index') }}" class="nav-link d-none d-lg-inline-block"><i class="fas fa-hdd"></i> Productos</a>
                            <a href="{{ route('products.index') }}" class="nav-link d-inline-block d-lg-none"><i class="fas fa-hdd fa-lg"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> {{-- collapse --}}
    </div> {{-- container --}}
</div>