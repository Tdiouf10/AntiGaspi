@extends('layouts.app')

@section('content')

    <div class="col-md-8" style="margin-top: 100px;">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h1>Utilisateurs
                    <a href="{{route('users.create')}}" class="btn btn-primary">
                        Ajouter un utilisateur
                    </a>
                </h1>
            </div>
            <div class="card-body">
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
                                        <label class="badge btn-primary"> Admin</label>
                                    @else
                                        <label class="badge btn-danger"> Utilisateur</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success">
                                        Modifier
                                    </a>
                                </td>
                                <td>
                                    <form method="post" action="{{route('users.destroy',$user->id)}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
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
