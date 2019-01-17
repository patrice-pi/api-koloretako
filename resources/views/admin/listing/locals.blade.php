@extends('admin.layout.app')

@section('content')

    <h1 class="pb-4 pt-3">Liste des locaux</h1>
    <hr>
    <p class="d-block text-right">
        <a href="{{ route('admin_local_create') }}" class="btn btn-primary">Ajouter un local</a>
    </p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Libellé</th>
            <th scope="col">Prix</th>
            <th scope="col">Ville</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        <tbody>
        @foreach($locals as $local)
            <tr>
                <td>{{ $local->id }}</td>
                <td>{{ $local->label }}</td>
                <td>{{ $local->price }}</td>
                <td>{{ ucfirst($local->city->label) }}</td>
                <td><a href="{{route('admin_local', ['local' => $local]) }}" class="btn btn-primary">Modifier</a></td>
                <td><a href="{{route('admin_local_delete', ['local' => $local]) }}" class="btn btn-danger">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
