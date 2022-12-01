@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-warning">
                @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h1> Ajouter un utilisateur
                    <a href="{{route('users.index')}}" class="btn btn-primary">
                        Retour
                    </a>
                </h1>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <label class="form-label" for="name">Nom</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="firstname" type="text"
                                       class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                       value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                @error('firstname')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <label class="form-label" for="firstname">Prénom</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <select name="is_admin" class="form-control">
                                    <option value="">Sélectionner un role</option>
                                    <option value="0">Utilisateur</option>
                                    <option value="1">Admin</option>
                                </select>
                                <label class="form-label" for="is_admin">Role</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <label class="form-label" for="email">E-mail</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="telephone" type="number"
                                       class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                       value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>
                                @error('telephone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <label class="form-label" for="form3Example2">Téléphone</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <label class="form-label" for="password">Mot de passe</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">

                                <label class="form-label" for="password-confirm">Confirmer mot de passe</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="address" type="text"
                                       class="form-control @error('address') is-invalid @enderror" name="address"
                                       value="{{ old('address') }}" required autocomplete="address" autofocus>
                                @error('address')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <label class="form-label" for="address">Adresse</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="code_postal" type="number"
                                       class="form-control @error('code_postal') is-invalid @enderror"
                                       name="code_postal" value="{{ old('code_postal') }}" required
                                       autocomplete="address" autofocus>
                                @error('code_postal')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <label class="form-label" for="code_postal">Code postal</label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-success btn-block mb-4">
                        S'inscrire
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
