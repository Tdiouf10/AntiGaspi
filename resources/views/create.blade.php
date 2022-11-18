@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{route('annonce.store')}}">
        @csrf
        <div class="d-flex justify-content-around">
            <div class="d-flex justify-content-around flex-column">
                <h1> Déposer une annonce</h1>
                <div class="form-group">
                    <label for="title">Titre de votre annonce</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                           id="title" name="title">
                    @if($errors->has('title'))
                        <span class="invalid-feedback"> {{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="price">Prix</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="form-group mb-0 pb-0">
                    <label for="description">Description de l'annonce</label>
                    <textarea name="description" class="form-control" id="description" rows="9"></textarea>
                </div>
            </div>
            @guest
                <div class="d-flex justify-content-between flex-column">
                    <h1> Infos Inscription</h1>
                    <div class="d-flex justify-content-between">
                        <div class="form-group pe-4">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                   id="name" name="name">
                            @if($errors->has('name'))
                                <span class="invalid-feedback"> {{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input type="text"
                                   class="form-control  {{ $errors->has('firstname') ? 'is-invalid' : '' }}"
                                   id="firstname" name="firstname">
                            @if($errors->has('firstname'))
                                <span class="invalid-feedback"> {{ $errors->first('firstname') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmation du Mot de passe</label>
                        <input type="password" class="form-control" id="password_confirmation"
                               name="password_confirmation">
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="form-group pe-2 w-75">
                            <label for="address">Adresse</label>
                            <input type="text"
                                   class="form-control  {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                   id="address" name="address">
                            @if($errors->has('address'))
                                <span class="invalid-feedback"> {{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="code_postal">Code postal</label>
                            <input type="number"
                                   class="form-control  {{ $errors->has('code_postal') ? 'is-invalid' : '' }}"
                                   id="code_postal" name="code_postal">
                            @if($errors->has('code_postal'))
                                <span class="invalid-feedback"> {{ $errors->first('code_postal') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="number"
                               class="form-control  {{ $errors->has('telephone') ? 'is-invalid' : '' }}"
                               id="telephone" name="telephone">
                        @if($errors->has('telephone'))
                            <span class="invalid-feedback"> {{ $errors->first('telephone') }}</span>
                        @endif
                    </div>
                </div>
            @endguest
        </div>
        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-primary">Enregister votre nouvelle annonce</button>
        </div>
    </form>
</div>

@endsection
