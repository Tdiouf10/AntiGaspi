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
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js','@fortawesome/fontawesome-free/js/all.js'])
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<div id="app">
    <div class="col-md-12">
        <nav class="navbar navbar-expand-md shadow-sm border rounded-0" style="background-color: #b1dfbb">
            <div class="container justify-content-between">
                <div class="menu-wrapper d-flex justify-content-between w-auto">
                    @guest
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Anti-Gaspi
                        </a>
                    @endguest
                    @auth
                            <a class="navbar-brand" href="{{ route('home.index')  }}">
                                Anti-Gaspi
                            </a>
                    @endguest
                    <ul class="navbar-nav">
                        @auth
                            <li>
                                <a href="{{ route('annonces.create') }}" class="nav-link hover-underline-animation">Déposer une annonce</a>
                            </li>
                            <li>
                                <a href="{{ route('annonces.index') }}" class="nav-link hover-underline-animation">Rechercher</a>
                            </li>
                            <li>
                                <a href="{{ route('annonces.index') }}" class="nav-link">Voir les annonces</a>
                            </li>
                            @if(auth()->user()->is_admin === 1)
                                <li>
                                    <a class="nav-link" href="{{ route("categories.create") }}">
                                        Créer une catégorie
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="d-flex " id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link hover-underline-animation" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link hover-underline-animation" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="">{{ __('Messages') }}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
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
    @include('footer')
</div>
@yield('extra-js')
@yield('scripts')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>
</html>
