@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between w-100">
            <div class="container card card_style p-lg-5 p-mg-2 p-1" style="margin-top: 100px;">
                <h1 class="text-center mb-5">Modifier votre profile</h1>
                <form method="POST" action=" {{ route('user.edit-profil') }}">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-around flex-column">
                        <div class="container">
                            <div class="row text-center w-100">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group mb-3">
                                                        <label for="name">{{ __('Nom') }}</label>
                                                        <input id="name" type="text"
                                                               class="form-control @error('name') is-invalid @enderror"
                                                               name="name"
                                                               value="{{ old('name')?old('name'):$user->name}}" required
                                                               autocomplete="name" autofocus>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="firstname">{{ __('Prénom') }}</label>
                                                        <input id="firstname" type="text"
                                                               class="form-control @error('firstname') is-invalid @enderror"
                                                               name="firstname"
                                                               value="{{ old('firstname')?old('firstname'):$user->firstname}}"
                                                               required autocomplete="firstname" autofocus>
                                                        @error('firstname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email">{{ __('Email') }}</label>
                                                <input id="email" type="email"
                                                       class="form-control @error('email') is-invalid @enderror w-50 mx-auto"
                                                       name="email" value="{{ old('email')?old('email'):$user->email }}"
                                                       required autocomplete="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="telephone">{{ __('Téléphone') }}</label>
                                                <input id="telephone" type="number"
                                                       class="form-control @error('telephone') is-invalid @enderror w-50 mx-auto"
                                                       name="telephone"
                                                       value="0{{ old('telephone')?old('telephone'):$user->telephone}}"
                                                       required autocomplete="address" autofocus>
                                                @error('telephone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="address">{{ __('Adresse') }}</label>
                                                        <input id="address" type="text"
                                                               class="form-control @error('address') is-invalid @enderror"
                                                               name="address"
                                                               value="{{ old('address')?old('address'):$user->address }}"
                                                               required autocomplete="address" autofocus>
                                                        @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="code_postal">{{ __('Code postal') }}</label>
                                                        <input id="code_postal" type="number"
                                                               class="form-control @error('code_postal') is-invalid @enderror"
                                                               name="code_postal"
                                                               value="{{ old('code_postal')?old('code_postal'):$user->code_postal }}"
                                                               required autocomplete="address" autofocus>
                                                        @error('code_postal')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around align-items-center mt-5">
                        <div>
                            <a href="{{ route('welcome') }}" class="btn btn-danger"> Retour </a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">
                                {{ __('Modifier') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <h2 class="mt-5">Vos annonces</h2>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach(\App\Models\Annonce::all() as $annonce)
                @if(\Illuminate\Support\Facades\Auth::id() === $annonce->user_id)
                    <div class="col py-4">
                        <div class="card card_style h-100 shadow-sm">
                            <img class="card-img-top" src="{{ asset('images/' .$annonce->image)}}">
                            <div class="card-body text-center d-flex justify-content-between flex-column">
                                <h5 class="card-title">{{ $annonce->title }}</h5>
                                <small> {{ Carbon\Carbon::parse($annonce->created_at)->diffForHumans() }}</small>
                                <p class="card-text text-info"> {{ $annonce->localisation }}</p>
                                <p class="card-text"> {{ $annonce->description }}</p>
                                <div class="row">
                                    <div class="col-6">
                                        <form method="post" action="{{route('annonces.destroy',$annonce->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger col mx-2">Supprimer</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{route('annonces.edit', $annonce->id)}}"
                                           class="col mx-2 btn btn-success text-white">Modifier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        @if(auth()->user()->is_admin === 1)
        <h2 class="mt-5">Annonces des autres utilisateurs</h2>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach(\App\Models\Annonce::all() as $annonce)
                @if(\Illuminate\Support\Facades\Auth::id() !== $annonce->user_id)
                    <div class="col py-4">
                        <div class="card card_style h-100 shadow-sm">
                            <img class="card-img-top" src="{{ asset('images/' .$annonce->image)}}">
                            <div class="card-body text-center d-flex justify-content-between flex-column">
                                <h5 class="card-title">{{ $annonce->title }}</h5>
                                <small> {{ Carbon\Carbon::parse($annonce->created_at)->diffForHumans() }}</small>
                                <p class="card-text text-info"> {{ $annonce->localisation }}</p>
                                <p class="card-text"> {{ $annonce->description }}</p>
                                <div class="row">
                                    <div class="col-6">
                                        <form method="post" action="{{route('annonces.destroy',$annonce->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger col mx-2">Supprimer</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{route('annonces.edit', $annonce->id)}}"
                                           class="col mx-2 btn btn-success text-white">Modifier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        @endif
    </div>
@endsection

