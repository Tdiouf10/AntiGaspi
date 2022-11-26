@extends('layouts.app')

@section('content')
    <!-- Section: Design Block -->
    <section class="text-center text-lg-start">
        <style>
            .cascading-right {
                margin-right: -50px;
            }

            @media (max-width: 991.98px) {
                .cascading-right {
                    margin-right: 0;
                }
            }
        </style>

        <div class="row mx-2" style="margin-top: 100px;">
            <div class="card col-lg-6 col-12 p-4">
                <div class="row g-0 align-items-center">
                    <div class="cascading-right" style="background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(30px);">
                        <div class="card-body p-5 shadow-5 text-center">
                            <h2 class="fw-bold mb-5">Se connecter</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                                   autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                            <label class="form-label" for="form3Example1">E-mail</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                            <label class="form-label" for="form3Example2">Mot de passe</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-success btn-block mb-4">
                                    Se connecter
                                </button>
                                <div class="row">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-black" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 m-auto">
                <div class="row w-100">
                    <img class="image" src="{{ URL('storage/img/panier_legumes.jpeg') }}" alt="image d'un panier de légumes garni"/>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
@endsection
