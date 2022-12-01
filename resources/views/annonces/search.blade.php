@extends('layouts.app')

@section('content')
    <div class="card" style="margin-top: 100px;">
        <div class="card-img-overlay">
            <div class="container mt-5">
                <div class="row">
                    <form method="GET" action="/search" role="search">
                        {{ csrf_field() }}
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="form-outline pe-1">
                                <input type="text" class="form-control" name="q">
                            </div>
                            <button type="submit" class="btn btn-success">Rechercher</button>
                        </div>
                    </form>
                </div>
                <div id="results">
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach($annonces as $annonce)
                            @if(\Illuminate\Support\Facades\Auth::id() !== $annonce->user_id)
                                <div class="col py-4">
                                    <div class="card h-100 shadow-sm">
                                        <img class="card-img-top" src="{{ asset($annonce->image)}}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $annonce->title }}</h5>
                                            <small> {{ Carbon\Carbon::parse($annonce->created_at)->diffForHumans() }}</small>
                                            <p class="card-text text-info"> {{ $annonce->localisation }}</p>
                                            <p class="card-text"> {{ $annonce->description }}</p>
                                            <a href="" class="btn btn-success">Voir l'annonce</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endsection