@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Déposer une annonce</h1>
    </div>
    <div class="container">
        <form method="POST" action="{{route('annonce.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Titre de votre annonce</label>
                <input type="email" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
                @if($errors->has('title'))
                    <span class="invalid-feedback"> {{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description de l'annonce</label>
                <textarea name="description"  class="form-control" id="description" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="localisation"> Localisation</label>
                <input type="text" class="form-control" id="localisation" name="localisation">
            </div>
            <div class="form-group">
                <label for="price" >Prix</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
