@extends('layouts.app')

@section('content')
    <div class="container-xl"  style="margin-top: 150px;">
        <div class="card">
            <div class="card-img-overlay">
                <div class="container mt-5">
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach($categories as $category)
                            <div class="col">
                                <div class="card h-100 shadow-sm p-2">
                                    <img class="card-img-top" src="{{URL::asset('/img/test.png')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ $category->name }}</h5>
                                    </div>
                                    @if(\Illuminate\Support\Facades\Auth::user()->is_admin === 1)
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{route('categories.edit', $category->id)}}" class="col mx-2 btn btn-success">Modifier</a>
                                            <form method="post" action="{{route('categories.destroy',$category->id)}}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger col mx-2">Supprimer</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
