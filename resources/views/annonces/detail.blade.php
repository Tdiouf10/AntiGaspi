@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 100px;" >
        <div class="card card_style shadow-sm my-auto">
            <div class="card-body row">
                <div class="col text-center">
                    <h2>Informations de l'annonce</h2>
                    <h5 class="card-title mt-5">{{ $annonce->title  }}</h5>
                    <small> {{ Carbon\Carbon::parse($annonce->created_at)->diffForHumans() }}</small>
                    <p class="card-text text-info"> {{ $annonce->localisation }}</p>
                    <img class="card-img-top my-3" src="{{ asset($annonce->image)}}">
                    <p class="card-text"> {{ $annonce->description }}</p>
                </div>
                <div class="col">
                    <h2 class="text-center">Annonce déposée par :</h2>
                    <div class="mt-5 text-center">
                        <p>Nom : {{ $annonce->user->name }}</p>
                        <p>Prénom : {{ $annonce->user->firstname }}</p>
                        <p>Numéro de téléphone : 0{{ $annonce->user->telephone }}</p>
                        <p>Email : {{ $annonce->user->email }}</p>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <a href="{{ route('annonces.index') }}" class="btn btn-danger"> Retour </a>
                </div>
            </div>
        </div>
    </div>
@endsection
