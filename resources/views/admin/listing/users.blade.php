@extends('admin.layout.app')

@section('content')

    {{--
        Ajouter chaque utilisateur + les liens modification/suppresion
        Ne pas oublier de supprimer la class user pr test, et ce commentaire.
    --}}

    <h1 class="pb-4 pt-3">Liste des utilisateurs</h1>
    <hr>
    <p class="d-block text-right">
        <a href="{{ route('admin_user_create') }}" class="btn btn-primary">Ajouter un utilisateur</a>
    </p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Adresse Email</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('admin_user', ['id' => $user]) }}" class="btn btn-primary">Modifier</a></td>
                    <td><a href="{{ route('admin_user_delete', ['user' => $user]) }}" class="btn btn-danger {{ $user->id == request()->user()->id ? 'disabled' : '' }}">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </table>

@endsection
