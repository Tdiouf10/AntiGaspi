@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-img-top">
            <img src="{{ URL('storage/img/fond_create.jpeg') }}" class="image-fond" alt=""/>
        </div>
        <div class="card-img-overlay">
            <div class="container w-50 card p-5 fond-couleur">
                <form method="POST" action="{{route('annonces.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-around">
                        <div class="d-flex justify-content-around flex-column">
                            <div class="container">
                                <div class="row justify-content-center w-100">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between align-items-center flex-column">
                                            <h1>Déposer une annonce</h1>
                                            <div class="form-group my-2">
                                                <label for="title">Titre de votre annonce</label>
                                                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" name="title">
                                                @if($errors->has('title'))
                                                    <span class="invalid-feedback"> {{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-between my-2">
                                                <div class="form-group pe-4 w-75">
                                                    <label for="category_id"> Catégorie </label>
                                                    <select name="category_id" class="form-control">
                                                        @foreach ($categories as $category)
                                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Prix</label> €
                                                    <input type="text" class="form-control" id="price" name="price">
                                                </div>
                                            </div>
                                            <div class="form-group my-2">
                                                <label for="description">Description de l'annonce</label>
                                                <textarea name="description"
                                                          class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                                          id="description" rows="3"></textarea>
                                                @if($errors->has('description'))
                                                    <span class="invalid-feedback"> {{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group my-2">
                                                <label for="title">Image</label>
                                                <input type="file" class="form-control" id="image" name="image">
                                            </div>
                                            <div class="d-flex justify-content-between my-2">
                                                <div class="form-group pe-4">
                                                    <label for="localisation">Ville</label>
                                                    <input type="text"
                                                           class="form-control {{ $errors->has('localisation') ? 'is-invalid' : '' }}"
                                                           id="localisation" name="localisation">
                                                    @if($errors->has('localisation'))
                                                        <span class="invalid-feedback"> {{ $errors->first('localisation') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="code_postal">Code postal</label>
                                                    <input type="text"
                                                           class="form-control {{ $errors->has('code_postal') ? 'is-invalid' : '' }}"
                                                           id="code_postal" name="code_postal">
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
                        {{--                @guest--}}
                        {{--                    <div class="d-flex justify-content-between flex-column">--}}
                        {{--                        <h1> Infos Inscription</h1>--}}
                        {{--                        <div class="d-flex justify-content-between">--}}
                        {{--                            <div class="form-group pe-4">--}}
                        {{--                                <label for="name">Nom</label>--}}
                        {{--                                <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"--}}
                        {{--                                       id="name" name="name">--}}
                        {{--                                @if($errors->has('name'))--}}
                        {{--                                    <span class="invalid-feedback"> {{ $errors->first('name') }}</span>--}}
                        {{--                                @endif--}}
                        {{--                            </div>--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <label for="firstname">Prénom</label>--}}
                        {{--                                <input type="text"--}}
                        {{--                                       class="form-control  {{ $errors->has('firstname') ? 'is-invalid' : '' }}"--}}
                        {{--                                       id="firstname" name="firstname">--}}
                        {{--                                @if($errors->has('firstname'))--}}
                        {{--                                    <span class="invalid-feedback"> {{ $errors->first('firstname') }}</span>--}}
                        {{--                                @endif--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="email">Email</label>--}}
                        {{--                            <input type="email" class="form-control" id="email" name="email">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="password">Mot de passe</label>--}}
                        {{--                            <input type="password" class="form-control" id="password" name="password">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="password-confirm">Confirmation du Mot de passe</label>--}}
                        {{--                            <input type="password" class="form-control" id="password-confirm"--}}
                        {{--                                   name="password-confirm">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="d-flex justify-content-between">--}}
                        {{--                            <div class="form-group pe-2 w-75">--}}
                        {{--                                <label for="address">Adresse</label>--}}
                        {{--                                <input type="text"--}}
                        {{--                                       class="form-control  {{ $errors->has('address') ? 'is-invalid' : '' }}"--}}
                        {{--                                       id="address" name="address">--}}
                        {{--                                @if($errors->has('address'))--}}
                        {{--                                    <span class="invalid-feedback"> {{ $errors->first('address') }}</span>--}}
                        {{--                                @endif--}}
                        {{--                            </div>--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <label for="code_postal">Code postal</label>--}}
                        {{--                                <input type="number"--}}
                        {{--                                       class="form-control  {{ $errors->has('code_postal') ? 'is-invalid' : '' }}"--}}
                        {{--                                       id="code_postal" name="code_postal">--}}
                        {{--                                @if($errors->has('code_postal'))--}}
                        {{--                                    <span class="invalid-feedback"> {{ $errors->first('code_postal') }}</span>--}}
                        {{--                                @endif--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="telephone">Téléphone</label>--}}
                        {{--                            <input type="number"--}}
                        {{--                                   class="form-control  {{ $errors->has('telephone') ? 'is-invalid' : '' }}"--}}
                        {{--                                   id="telephone" name="telephone">--}}
                        {{--                            @if($errors->has('telephone'))--}}
                        {{--                                <span class="invalid-feedback" role="alert"> {{ $errors->first('telephone') }}</span>--}}
                        {{--                            @endif--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        {{--                @endguest--}}

                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <button type="submit" class="btn btn-success">Enregister votre nouvelle annonce</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
