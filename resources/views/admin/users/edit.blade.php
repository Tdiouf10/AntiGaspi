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
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name')?old('name'):$user->name}}" required autocomplete="name" autofocus>
                                <label class="form-label" for="name">Nom</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="firstname" type="text"
                                       class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                       value="{{ old('firstname')?old('firstname'):$user->firstname}}" required autocomplete="firstname" autofocus>
                                <label class="form-label" for="firstname">Prénom</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <select name="is_admin" class="form-control">
                                    <option value="">Sélectionner un role</option>
                                    <option value="0" {{ $user->is_admin === 0 ? 'selected' : ''}}>Utilisateur</option>
                                    <option value="1" {{ $user->is_admin === 1 ? 'selected' : ''}}>Admin</option>
                                </select>
                                <label class="form-label" for="is_admin">Role</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email')?old('email'):$user->email}}" required autocomplete="email">
                                <label class="form-label" for="email">E-mail</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="telephone" type="number"
                                       class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                       value="{{ old('telephone')?old('telephone'):$user->telephone}}" required autocomplete="telephone" autofocus>
                                <label class="form-label" for="form3Example2">Téléphone</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       value="{{ old('password')?old('password'):$user->password}}" required autocomplete="new-password">
                                <label class="form-label" for="password">Mot de passe</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="password-confirm" type="password" class="form-control"
                                       value="{{ old('password')?old('password'):$user->password}}" name="password_confirmation" required autocomplete="new-password">
                                <label class="form-label" for="password-confirm">Confirmer mot de passe</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="address" type="text"
                                       class="form-control @error('address') is-invalid @enderror" name="address"
                                       value="{{ old('address')?old('address'):$user->address}}" required autocomplete="address" autofocus>
                                <label class="form-label" for="address">Adresse</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input id="code_postal" type="number"
                                       class="form-control @error('code_postal') is-invalid @enderror"
                                       name="code_postal" value="{{ old('code_postal')?old('code_postal'):$user->code_postal}}" required
                                       autocomplete="address" autofocus>
                                <label class="form-label" for="code_postal">Code postal</label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-success btn-block mb-4">
                        Modidier
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
