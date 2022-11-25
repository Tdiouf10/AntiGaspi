@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-img-top">
        <img src="{{ URL('storage/img/fond.jpeg') }}" class="image-fond" alt=""/>
    </div>
    <div class="card-img-overlay">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header h1">{{ __('Inscription') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mt-2">
                                            <label for="name" >{{ __('Nom') }}</label>
                                            <div class="col-12">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mt-2">
                                            <label for="firstname">{{ __('Prénom') }}</label>
                                            <div class="col-12">
                                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                                @error('firstname')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="email">{{ __('Email') }}</label>
                                    <div class="col-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mt-2">
                                            <label for="password" >{{ __('Password') }}</label>
                                            <div class="col-12">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mt-2">
                                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                            <div class="col-12">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mt-2">
                                            <label for="address">{{ __('Adresse') }}</label>
                                            <div class="col-12">
                                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mt-2">
                                            <label for="code_postal">{{ __('Code postal') }}</label>
                                            <div class="col-12">
                                                <input id="code_postal" type="number" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{ old('code_postal') }}" required autocomplete="address" autofocus>
                                                @error('code_postal')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="telephone">{{ __('Téléphone') }}</label>
                                    <div class="col-12">
                                        <input id="telephone" type="number" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>
                                        @error('telephone')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-success">{{ __('Inscription') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
