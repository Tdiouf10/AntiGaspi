@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-img-top">
            <img src="{{ URL('storage/img/fond_accueilV2.jpeg') }}" class="image-fond" alt=""/>
        </div>
        <div class="card-img-overlay h-100 text-center d-flex align-items-center justify-content-center">
            <h1><label class="display-2">Bienvenue sur<br>AntiGaspi</label><br><br>Votre site de troc alimentaire anti-gaspi !</h1>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($annonces as $annonce)
            <div class="col">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset($annonce->image)}}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $annonce->title }}</h5>
                        <small class="card-footer"> {{ Carbon\Carbon::parse($annonce->created_at)->diffForHumans() }}</small>
                        <p class="card-text text-info"> {{ $annonce->localisation }}</p>
                        <p class="card-text"> {{ $annonce->description }}</p>
                        <a href="" class="btn btn-success">Voir l'annonce</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
