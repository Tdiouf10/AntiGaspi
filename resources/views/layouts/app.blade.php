<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/main.js', 'resources/css/style.css',
        'resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js', 'resources/bootstrap/js/bootstrap.bundle.js',
        'resources/bootstrap-icons/bootstrap-icons.css','resources/glightbox/css/plyr.css', 'resources/glightbox/css/glightbox.css',
        'resources/glightbox/js/glightbox.js', 'resources/boxicons/css/boxicons.css','resources/boxicons/css/animations.css',
        'resources/boxicons/css/transformations.css', 'resources/isotope-layout/isotope.pkgd.js', 'resources/php-email-form/validate.js',
        'resources/purecounter/purecounter_vanilla.js', 'resources/swiper/swiper-bundle.min.css', 'resources/swiper/swiper-bundle.min.js',
        'resources/waypoints/noframework.waypoints.js'
    ])
</head>
<body class="">
<div id="app">

<div class="fixed-top">
    <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-xl d-flex justify-content-between align-items-center">
            <div id="titleproject">
                <h1 class="logo">
                    <a href="{{ url('/')  }}">Anti-Gaspi<i class="bi bi-basket fs-3 ms-3"></i></a>
                </h1>
            </div>
            <a href="{{ url('/apropos') }}" class="text-success"><u>A Propos</u><i class="bi bi-question-lg"></i></a>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('annonces.create') }}"><u>Déposer une annonce</u><i class="bi bi-plus-circle"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('annonces.index') }}"><u>Rechercher</u><i class="bi bi-search"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('annonces.index') }}" class="nav-link"><u>Voir les annonces</u><i class="bi bi-eye"></i></a>
                            </li>
                            @if(auth()->user()->is_admin === 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route("categories.create") }}"><u>Créer une catégorie</u><i class="bi bi-plus-circle-fill"></i></a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route("categories.index") }}"><u>Voir les catégories</u><i class="bi bi-eye-fill"></i></a>
                            </li>
                        @endauth
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   v-pre>{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <u>{{ __('Déconnexion') }}</u><i class="bi bi-box-arrow-left"></i>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('user.edit-profil') }}">
                                        <u>{{ __('Profile') }}</u><i class="bi bi-person-circle"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
        @auth
            <div class="container" style="max-height: 100%;">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        @endauth
        @yield('content')
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
</body>
</html>
