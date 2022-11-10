@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-img-top">
            <img src="{{ URL('storage/img/fond_accueil.jpeg') }}" class="image-fond" alt=""/>
        </div>
        <div class="card-img-overlay h-100 text-center d-flex align-items-center justify-content-center">
            <h1><label class="display-2">Bienvenue sur<br>AntiGaspi</label><br><br>Votre site de troc alimentaire anti-gaspi !</h1>
        </div>
    </div>
@endsection
