@extends('layouts.app')

@section('content')
    <div class="col-12 flex-container center">
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

        <div class="card card_style mx-5">
            <h1 class="text-center my-5"> Ajouter un utilisateur</h1>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-outline text-center">
                                        <label class="form-label" for="name">Nom</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror mx-auto" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-outline text-center">
                                        <label class="form-label" for="firstname">Prénom</label>
                                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror mx-auto" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                        @error('firstname')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="form-outline text-center">
                                <label class="form-label" for="is_admin">Role</label>
                                <select name="is_admin" class="form-control w-50 mx-auto">
                                    <option value="">Sélectionner un role</option>
                                    <option value="0">Utilisateur</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="form-outline text-center">
                                <label class="form-label" for="email">E-mail</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror w-50 mx-auto" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="form-outline text-center">
                                <label class="form-label" for="form3Example2">Téléphone (ex: 0768742310)</label>
                                <input id="telephone" type="number" class="form-control @error('telephone') is-invalid @enderror w-50 mx-auto" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>
                                @error('telephone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-4">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-outline text-center">
                                    <label class="form-label" for="password">Mot de passe</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mx-auto" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-outline text-center">
                                    <label class="form-label" for="password-confirm">Confirmer mot de passe</label>
                                    <input id="password-confirm" type="password" class="form-control mx-auto" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div> 
                        </div>
                        <div class="col-6 mb-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-outline text-center">
                                        <label class="form-label" for="address">Adresse</label>
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror mx-auto" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-outline text-center">
                                        <label class="form-label" for="code_postal">Code postal</label>
                                        <input id="code_postal" type="number"
                                            class="form-control @error('code_postal') is-invalid @enderror mx-auto"
                                            name="code_postal" value="{{ old('code_postal') }}" required
                                            autocomplete="address" autofocus>
                                        @error('code_postal')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <a href="{{route('users.index')}}" class="btn btn-danger">
                                Retour
                            </a>
                        </div>
                        <div class="col">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-success btn-block mb-4">
                                Ajouter
                            </button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
