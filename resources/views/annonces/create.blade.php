@extends('layouts.app')

@section('content')
<div class="row mx-2" style="margin-top: 100px;">
    <div class="card card_style col-lg-6 col-12 p-4">
        <form method="POST" action=" {{ isset($annonce) ?  route('annonces.update', $annonce->id) : route('annonces.store')}}" enctype="multipart/form-data">
            @csrf
            @if(isset($annonce))
                @method('PUT')
            @endif
            <div class="d-flex justify-content-around">
                <div class="d-flex justify-content-around flex-column">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center flex-column">
                                    <h1>{{ isset($annonce) ? 'Modifier votre annonce' : 'Ajouter une annonce' }}</h1>
                                    <div class="form-group my-2">
                                        <label for="title">Titre de votre annonce</label>
                                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" name="title"
                                               value="{{ isset($annonce) ? $annonce->title : '' }}">
                                        @if($errors->has('title'))
                                            <span class="invalid-feedback"> {{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-between my-2">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group w-100">
                                                    <label for="category_id">Catégorie</label>
                                                    <select name="category_id" class="form-control">
                                                        @foreach ($categories as $category)
                                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="price">Prix</label> €
                                                    <input type="text" class="form-control" id="price" name="price"
                                                           value="{{ isset($annonce) ? $annonce->price : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group my-2">
                                        <label for="description">Description de l'annonce</label>
                                        <textarea name="description" class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" rows="3"
                                                  placeholder="{{ isset($annonce) ? $annonce->description : '' }}"></textarea>
                                        @if($errors->has('description'))
                                            <span class="invalid-feedback"> {{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group my-2">
                                        <label for="title">Image</label>
                                        <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image" name="image" value="{{ isset($annonce) ?$annonce->image : '' }}">
                                        @if($errors->has('image'))
                                            <span class="invalid-feedback"> {{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-between my-2">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="localisation">Ville</label>
                                                    <input type="text" class="form-control {{ $errors->has('localisation') ? 'is-invalid' : '' }}" id="localisation" name="localisation"
                                                           value="{{ isset($annonce) ? $annonce->localisation : '' }}">
                                                    @if($errors->has('localisation'))
                                                        <span class="invalid-feedback"> {{ $errors->first('localisation') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="code_postal">Code postal</label>
                                                    <input type="text" class="form-control {{ $errors->has('code_postal') ? 'is-invalid' : '' }}" id="code_postal" name="code_postal"
                                                           value="{{ isset($annonce) ? $annonce->code_postal : '' }}">
                                                    @if($errors->has('code_postal'))
                                                        <span class="invalid-feedback"> {{ $errors->first('code_postal') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <button class="btn btn-success">{{ isset($annonce) ? 'Modifier votre annonce' : 'Ajouter une annonce' }}</button>
            </div>
        </form>
    </div>
    <div class="col-lg-6 col-12 m-auto">
        <img class="image" src="{{ URL('storage/img/apropos/panier_legumes.jpeg') }}" alt="image d'un panier de légumes garni"/>
    </div>
</div>
@endsection
