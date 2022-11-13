@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Page d'accueil</h1>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>

@endsection
