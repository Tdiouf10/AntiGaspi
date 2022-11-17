@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-img-top">
            <img src="{{ URL('storage/img/fond_create.jpeg') }}" class="image-fond" alt=""/>
        </div>
        <div class="card-img-overlay">
            <div class="container p-5">
                @if(\Illuminate\Support\Facades\Auth::user()->is_admin === 1)
                <div class="d-flex justify-content-end mb-2">
                    <a href="{{ route('categories.create') }}" class="btn btn-success text-white">Ajouter une catégorie</a>
                </div>
                @endif

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($categories as $category)
                        <div class="col">
                            <div class="card h-100 shadow-sm p-2">
                                <img class="card-img-top" src="{{URL::asset('/img/test.png')}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $category->name }}</h5>
                                </div>
                                @if(\Illuminate\Support\Facades\Auth::user()->is_admin === 1)
                                <div class="row">
                                    <a href="{{route('categories.edit', $category->id)}}" class="col mx-2 btn btn-success text-white">Modifier</a>
                                    <button class="col mx-2 btn btn-danger" onclick="handleDelete({{ $category->id }})">Supprimer</button>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="POST" id="deleteCategoryForm">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Voulez-vous vraiment supprimer la catégorie ?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="h-100 shadow-sm p-2">
                                        <img class="card-img-top" src="{{URL::asset('/img/test.png')}}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $category->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-success">Supprimer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteCategoryForm')
            form.action = '/categories/' + id
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
