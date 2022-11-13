@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('annonces.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-around">
                <div class="d-flex justify-content-around flex-column">
                    <h1> Déposer une annonce</h1>
                    <div class="form-group">
                        <label for="title">Titre de votre annonce</label>
                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                               id="title" name="title">
                        @if($errors->has('title'))
                            <span class="invalid-feedback"> {{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-0 pb-0">
                        <label for="description">Description de l'annonce</label>
                        <textarea name="description" class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" rows="9"></textarea>
                        @if($errors->has('description'))
                            <span class="invalid-feedback"> {{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="localisation">Ville</label>
                        <input type="text" class="form-control {{ $errors->has('localisation') ? 'is-invalid' : '' }}"
                               id="localisation" name="localisation">
                        @if($errors->has('localisation'))
                            <span class="invalid-feedback"> {{ $errors->first('localisation') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="code_postal">Code postal</label>
                        <input type="text" class="form-control {{ $errors->has('code_postal') ? 'is-invalid' : '' }}"
                               id="code_postal" name="code_postal">
                        @if($errors->has('code_postal'))
                            <span class="invalid-feedback"> {{ $errors->first('code_postal') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-primary">Enregister votre nouvelle annonce</button>
            </div>
        </form>
    </div>

@endsection
