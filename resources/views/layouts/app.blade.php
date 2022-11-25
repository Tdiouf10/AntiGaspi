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
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
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
<body class="bg-white">
<div id="app">

<div class="fixed-top">
    <section id="topbar" class="d-flex align-items-center">
        <div class="container-xl d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center">
                    <span>
                        <a href="mailto:theodoremdiouf98@gmail.com"><u>theodoremdiouf98@gmail.com</u></a>
                    </span>
                </i>
                <a href="https://www.linkedin.com/in/theodore-diouf-035429225/" class="linkedin" style="text-decoration:none">
                    <i class="bi bi-linkedin d-flex align-items-center ms-4"></i>
                </a>
                <i class="bi bi-grip-vertical ms-5"></i>
                <i class="bi bi-envelope d-flex align-items-center ms-5">
                    <span>
                        <a href="mailto:oswald.perrinedu40@gmail.com"><u>oswald.perrinedu40@gmail.com</u></a>
                    </span>
                </i>
                <a href="https://www.linkedin.com/in/perrine-oswald-7a89431a2/" class="linkedin" style="text-decoration:none">
                    <i class="bi bi-linkedin d-flex align-items-center ms-4"></i>
                </a>
            </div>
        </div>
    </section>
    <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-xl d-flex justify-content-between align-items-center">
            <div id="titleproject">
                <h1 class="logo" style="padding: 10px 0 10px 0;">
                    <a href="{{ url('/')  }}">
                        Anti-Gaspi
                        <span>.</span>
                    </a>
                </h1>
            </div>
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
                                <a class="nav-link active" href="{{ route('annonces.create') }}">Déposer une annonce</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('annonces.index') }}">Rechercher</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('annonces.index') }}" class="nav-link">Voir les annonces</a>
                            </li>
                            @if(auth()->user()->is_admin === 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route("categories.create") }}">Créer une catégorie</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route("categories.index") }}">Voir les catégories</a>
                            </li>
                        @endauth
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link hover-underline-animation"
                                       href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link hover-underline-animation"
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
                                        {{ __('Déconnexion') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('user.edit-profil') }}">
                                        {{ __('Profile') }}
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
    <main>
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
    </main>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
</body>
</html>
