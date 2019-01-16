@extends('admin.layout.app')

@section('content')

    <h1 class="pb-4 pt-3">Liste des types de locaux</h1>
    <hr>
    <p class="d-block text-right">
        <a href="{{ route('admin_local_type_create')}}" class="btn btn-primary">Ajouter un type de local</a>
    </p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" width="30%">Id</th>
            <th scope="col" width="60%">Libellé</th>
            <th scope="col" width="20%">Modifier</th>
        </tr>
        </thead>
        <tbody>
        @foreach($localTypes as $localType)
            <tr>
                <td>{{ $localType->id }}</td>
                <td>{{ $localType->label }}</td>
                <td><a href="{{ route('admin_local_type', ['localType' => $localType]) }}" class="btn btn-primary">Modifier</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
