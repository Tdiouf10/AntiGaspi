@extends('layouts.app')

@section('content')
    <div class="container-xl" style="margin-top: 100px;">
        <div class="card">
            <div class="card-img-overlay">
                <div class="container mt-5">
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach($categories as $category)
                            <div class="col py-4">
                                <div class="card card_style h-100 shadow-sm">
                                    <img class="card-img-top h-50" src="{{  asset('images/' .$category->image) }}"
                                         alt="Card image cap">
                                    <div class="card-body text-center d-flex justify-content-between flex-column">
                                        <h5 class="card-title">{{ $category->name }}</h5>
                                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin === 1)
                                            <div class="row">
                                                <div>
                                                    <a href="{{route('categories.edit', $category->id)}}"
                                                       class="col mx-2 btn btn-success">Modifier</a>
                                                </div>
                                                <div class="mt-3">
                                                    <form method="post" action="{{route('categories.destroy',$category->id)}}">
                                                        @method('delete')
                                                        @csrf
                                                        <button onclick="return confirm('Etes vous sûres de vouloir supprimer cette catégories')"  type="submit" class="col mx-2 btn btn-danger">Supprimer</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
