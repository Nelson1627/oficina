<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('Visitas a Oficina')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div id="app">
        {{-- Nuestro menú --}}
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/home">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownVisitas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Visitas
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownVisitas">
                                <li><a class="dropdown-item" href="/visitas/create">Crear Visita</a></li>
                                <li><a class="dropdown-item" href="/visitas/update">Actualizar Visita</a></li>
                                <li><a class="dropdown-item" href="/visitas/show">Mostrar Visitas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownVisitantes" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Visitantes
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownVisitantes">
                                <li><a class="dropdown-item" href="/visitantes/create">Crear Visitantes</a></li>
                                <li><a class="dropdown-item" href="/visitantes/update">Actualizar Visitantes</a></li>
                                <li><a class="dropdown-item" href="/visitantes/show">Mostrar Visitantes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUsuarios" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Usuarios de Oficina
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownUsuarios">
                                <li><a class="dropdown-item" href="/usuarios/create">Crear Usuarios</a></li>
                                <li><a class="dropdown-item" href="/usuarios/update">Actualizar Usuarios</a></li>
                                <li><a class="dropdown-item" href="/usuarios/show">Mostrar Usuarios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTramites" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Trámites
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownTramites">
                                <li><a class="dropdown-item" href="/tramites/create">Crear Trámites</a></li>
                                <li><a class="dropdown-item" href="/tramites/update">Actualizar Trámites</a></li>
                                <li><a class="dropdown-item" href="/tramites/show">Mostrar Trámites</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownInformes" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Informes
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownInformes">
                                <li><a class="dropdown-item" href="/informes/create">Crear Informes</a></li>
                                <li><a class="dropdown-item" href="/informes/update">Actualizar Informes</a></li>
                                <li><a class="dropdown-item" href="/informes/show">Mostrar Informes</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> 

        <div class="container-fluid">
            {{-- Aquí irá el contenido de todas las páginas --}}
            @yield('content') 
        </div>
    </div>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) 
</body>
</html>
