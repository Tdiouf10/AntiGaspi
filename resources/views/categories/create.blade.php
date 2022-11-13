@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-header">
            {{ isset($category) ? 'Modifier catégorie' : 'Ajouter catégorie' }}
        </div>
        <form method="POST" action=" {{ isset($category) ?  route('categories.update', $category->id) : route('categories.store')}}">
            @csrf
            @if(isset($category))
            @method('PUT')
            @endif
            <div class="d-flex justify-content-around flex-column">
                <div class="form-group">
                    <label for="title">Nom de la Catégorie</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                           id="name" name="name" value="{{ isset($category) ? $category->name : '' }}">
                    @if($errors->has('name'))
                        <span class="invalid-feedback"> {{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div>
                    <button class="btn btn-success">
                        {{ isset($category) ? 'Modifier catégorie' : 'Ajouter catégorie' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
