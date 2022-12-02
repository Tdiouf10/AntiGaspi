@extends('layouts.app')

@section('content')

    <div class="col-12 flex-container center">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card card_style mx-5">
             <h1 class="text-center my-5">Utilisateurs</h1>
            <div class="card-body text-center">
                <a href="{{route('users.create')}}" class="btn btn-success mb-3">
                    <i class="bi bi-person-plus-fill"></i>
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <td>Id</td>
                            <td>Nom</td>
                            <td>Prenom</td>
                            <td>Email</td>
                            <td>Role</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->is_admin === 1)
                                        <label class="text-black">Admin</label>
                                    @else
                                        <label class="text-black">Utilisateur</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                </td>
                                <td>
                                    <form method="post" action="{{route('users.destroy',$user->id)}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
