@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="card">
            <div class="card-img-overlay">
                <div class="container mt-5">
                    <div id="results">
                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            <div class="col py-4">
                                <div class="card card_style h-100 shadow-sm">
                                    <img class="card-img-top" src="{{ asset($annonce->image)}}">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $annonce->title  }}</h5>
                                        <small> {{ Carbon\Carbon::parse($annonce->created_at)->diffForHumans() }}</small>
                                        <p class="card-text text-info"> {{ $annonce->localisation }}</p>
                                        <p class="card-text"> {{ $annonce->description }}</p>
                                        <p class="card-text"> {{ $annonce->user->name." ". $annonce->user->firstname}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
