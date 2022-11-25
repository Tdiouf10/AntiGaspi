@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between w-100">
            <div>
                <form method="POST" action=" {{ route('user.edit-profil') }}">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center flex-column">
                            <div class="d-flex justify-content-between">

                            </div>
                            <div class="form-group pe-4">
                                <label for="name">{{ __('Nom') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name')?old('name'):$user->name}}" required
                                       autocomplete="name"
                                       autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group pe-4">
                                <label for="firstname">{{ __('Prénom') }}</label>
                                <input id="firstname" type="text"
                                       class="form-control @error('firstname') is-invalid @enderror"
                                       name="firstname" value="{{ old('firstname')?old('firstname'):$user->firstname}}"
                                       required
                                       autocomplete="firstname" autofocus>

                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group pe-4">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email')?old('email'):$user->email }}" required
                                       autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group pe-4">
                                <label for="address">{{ __('Adresse') }}</label>
                                <input id="address" type="text"
                                       class="form-control @error('address') is-invalid @enderror"
                                       name="address" value="{{ old('address')?old('address'):$user->address }}"
                                       required
                                       autocomplete="address" autofocus>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group pe-4">
                                <label for="code_postal">{{ __('Code postal') }}</label>
                                <input id="code_postal" type="number"
                                       class="form-control @error('code_postal') is-invalid @enderror"
                                       name="code_postal"
                                       value="{{ old('code_postal')?old('code_postal'):$user->code_postal }}" required
                                       autocomplete="address" autofocus>

                                @error('code_postal')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group pe-4">
                                <label for="telephone">{{ __('Téléphone') }}</label>
                                <input id="telephone" type="number"
                                       class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                       value="{{ old('telephone')?old('telephone'):$user->telephone}}" required
                                       autocomplete="address" autofocus>

                                @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{ route('welcome') }}" class="btn btn-primary"> Retour </a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">
                                {{ __('Modifier') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach(\App\Models\Annonce::all() as $annonce)
                        @if(\Illuminate\Support\Facades\Auth::id() === $annonce->user_id)
                            <div class="col py-4">
                                <div class="card h-100 shadow-sm">
                                    <img class="card-img-top" src="{{ asset($annonce->image)}}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $annonce->title }}</h5>
                                        <small> {{ Carbon\Carbon::parse($annonce->created_at)->diffForHumans() }}</small>
                                        <p class="card-text text-info"> {{ $annonce->localisation }}</p>
                                        <p class="card-text"> {{ $annonce->description }}</p>
                                        @if(\Illuminate\Support\Facades\Auth::id() === $annonce->user_id)
                                            <a href="" class="btn btn-primary">Modifier l'annonce</a>
                                            <a href="" class="btn btn-danger">Supprimer l'annonce</a>
                                        @endif
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
@endsection
