@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-between flex-column">
            <div class="container mb-4">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-row justify-content-between">
                                <a href="{{ route('annonces.index') }}" class="pe-4"> Annonces</a>
                                <a href="{{ route('categories.index') }}"> Catégories</a>
                            </div>
                            <div class="">
                                <form method="POST" action="{{route('annonce.search')}}" onsubmit="search(event)"
                                      id="searchForm"
                                      class="">
                                    @csrf
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="form-outline pe-1">
                                            <input type="search" class="form-control" id="words">
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            Rechercher
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                        {{--                                @if(\Illuminate\Support\Facades\Auth::id() !== $annonce->user_id)--}}
                                        {{--                                    <a href="" class="btn btn-primary">Modifier l'annonce</a>--}}
                                        {{--                                    <a href="" class="btn btn-danger">Supprimer l'annonce</a>--}}
                                        {{--                                @endif--}}
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
