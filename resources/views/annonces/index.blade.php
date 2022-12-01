@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
    <div class="card">
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
                                    <div class="card card_style h-100 shadow-sm">
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
                        words: words,
                    })
                        .then(function (response) {
                            console.log(response)
                            const annonces = response.data.annonces
                            let results = document.querySelector('#results')
                            results.innerHTML = ''
                            for (let i = 0; i < annonces.length; i++) {
                                let container = document.createElement('container')
                                container.classList.add('container')
                                let style = document.createElement('div')
                                style.classList.add('row', 'row-cols-1', 'row-cols-md-3')
                                let column = document.createElement('div')
                                column.classList.add('col')
                                let card = document.createElement('div')
                                card.classList.add('card')
                                let cardBody = document.createElement('div')
                                cardBody.classList.add('card-body')
                                let title = document.createElement('h5')
                                title.classList.add('card-title')
                                title.innerHTML = annonces[i].title
                                let description = document.createElement('p')
                                description.classList.add('card-text')
                                description.innerHTML = annonces[i].description
                                container.appendChild(style)
                                style.appendChild(column)
                                column.appendChild(card)
                                card.appendChild(cardBody)
                                cardBody.appendChild(title)
                                cardBody.appendChild(description)
                                results.appendChild(container)
                            }
                        })
                        .catch(function (error) {
                            console.log(error)
                        });
                }
            </script>
        @endsection
