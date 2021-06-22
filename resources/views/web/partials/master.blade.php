<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/img/telepractica-logo-16x16.png" />

    <title>
        @yield('title')
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}?v72" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

    @yield('estilos')

</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="/">
            <img src="{{ '/img/telepractica-logo-32x32.png' }}" alt="Telepráctica Logo" class="brand-image img-circle"
                style="opacity: .8">
            Telepráctica
        </a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                {{-- <li class="nav-item active">
                    <a class="nav-link" href="#">Soy practicante <span class="sr-only">(current)</span></a>
                </li> --}}

                <li class="nav-item m-1 active">
                    <a class="nav-link" href="/ofertas">Ofertas<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item m-1">
                    <a class="nav-link" href="/soy-practicante">Soy practicante<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item m-1">
                    <a class="nav-link" href="/soy-empresa">Soy empresa<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item m-1">
                    <a class="nav-link" href="/soy-institucion">Soy institución<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item m-1">
                    <a class="nav-link" href="/quienes-somos">¿Quiénes somos?</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown active">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>
                    </a>

                    @if (Route::has('login'))
                        @auth
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <a href="/cuenta" class="dropdown-item">
                                    <i class="fas fa-user-lock mr-3"></i>Cuenta
                                </a>

                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-3"></i>Salir
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <a href="{{ route('login') }}" class="dropdown-item">
                                    <i class="fas fa-user-lock mr-3"></i>Ingresar
                                </a>
                            </div>
                        @endauth
                    @endif
                </li>
            </ul>
        </div>
    </nav>

    {{-- Yield --}}
    <div>
        @yield('content')
    </div>

    {{-- Footer --}}
    <section>
        <div class="text-center">
            <p>2021 Telepráctica ©Creatiox</p>

            <a class="text-secondary text-lg" href="#"><i class="fab fa-facebook-square"></i></a>
            <a class="text-secondary text-lg" href="#"><i class="fab fa-twitter-square"></i></a>
            <a class="text-secondary text-lg" href="#"><i class="fab fa-instagram-square"></i></a>
            <br>
        </div>
    </section>

</body>

@yield('scripts')

</html>
