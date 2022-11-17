@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-center align-items-center p-5">
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{URL::asset('/img/welcome.jpg')}}" class="img-fluid rounded-0 w-100" alt="">
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center w-100">
                <h5> Lutter contre le gaspillage </h5>
            </div>
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
