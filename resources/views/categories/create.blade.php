@extends('layouts.app')

@section('content')
<div class="card" style="margin-top: 100px;">
    <div class="card-img-overlay">
        <div class="container w-50 card card_style p-5 fond-couleur">
            <h1>{{ isset($category) ? 'Modifier catégorie' : 'Ajouter une catégorie' }}</h1>
            <form method="POST" action=" {{ isset($category) ?  route('categories.update', $category->id) : route('categories.store')}}"  enctype="multipart/form-data">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="d-flex justify-content-around flex-column">
                    <div class="form-group my-2">
                        <label for="title">Nom de la Catégorie</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                               id="name" name="name" value="{{ isset($category) ? $category->name : '' }}">
                        @if($errors->has('name'))
                            <span class="invalid-feedback"> {{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group my-2">
                        <label for="title">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-success">{{ isset($category) ? 'Modifier catégorie' : 'Ajouter catégorie' }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
