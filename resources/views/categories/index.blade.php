@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-2">
            <a href=" {{ route('categories.create') }}" class="btn btn-primary"> Ajouter une catégorie</a>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($categories as $category)
                <div class="col py-4">
                    <div class="card h-100 shadow-sm">
                        <img class="card-img-top" src="{{URL::asset('/img/test.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                        </div>
                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info btn-sm"> Modifier</a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">
                            Supprimer
                        </button>
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
                            <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger"> Supprimer</button>
                        </div>
                    </div>
                </form>
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
