@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach($annonces as $annonce)
                    <div class="col py-4">
                        <div class="card h-100 shadow-sm">
                            <img class="card-img-top" src="{{ asset($annonce->image)}}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $annonce->title }}</h5>
                                <small> {{ Carbon\Carbon::parse($annonce->created_at)->diffForHumans() }}</small>
                                <p class="card-text text-info"> {{ $annonce->localisation }}</p>
                                <p class="card-text"> {{ $annonce->description }}</p>
                                <a href="" class="btn btn-success">Voir l'annonce</a>
                                <a href="" class="btn btn-primary">Modifier l'annonce</a>
                                <a href="" class="btn btn-danger">Supprimer l'annonce</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
