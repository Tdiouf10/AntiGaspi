@extends('layouts.app')

@section('content')


    <div class="container">
        <form method="POST" action="{{route('annonce.search')}}" onsubmit="search(event)" id="searchForm">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="words">
                <button type="submit" class="btn btn-primary"> Rechercher</button>
            </div>
        </form>
            <div class="results">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($annonces as $annonce)
                    <div class="col">
                        <div class="card">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $annonce->title }}</h5>
                                <small> {{ Carbon\Carbon::parse($annonce->created_at)->diffForHumans() }}</small>
                                <p class="card-text text-info"> {{ $annonce->localisation }}</p>
                                <p class="card-text"> {{ $annonce->description }}</p>
                                <a href="" class="btn btn-primary">Voir l'annonce</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>
        function search(event) {
            event.preventDefault()
            const words = document.querySelector('#words').value
            const url = document.querySelector('#searchForm').getAttribute('action')
            axios.post(`${url}`, {
                words:words,
            })
                .then(function (response) {
                    const annonces = response.data.annonces
                    let results = document.querySelector('#results')
                    results.innerHTML = ''
                })
                .catch(function (error) {
                    console.log(error)
                });
        }
    </script>
@endsection

