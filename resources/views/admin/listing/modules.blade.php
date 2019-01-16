@extends('admin.layout.app')

@section('content')

    {{--
        Ajouter chaque modules + les liens modification/suppresion
        Ne pas oublier de supprimer la class user pr test, et ce commentaire.
    --}}

    <h1 class="pb-4 pt-3">Liste des modules</h1>
    <hr>
    <p class="d-block text-right">
        <a href="{{ route('admin_module_create') }}" class="btn btn-primary">Ajouter un module</a>
    </p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Libellé</th>
            <th scope="col">Prix</th>
            <th scope="col">Type</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        <tbody>
        @foreach($modules as $module)
            <tr>
                <td>{{ $module->id }}</td>
                <td>{{ ucfirst($module->label) }}</td>
                <td>{{ $module->price }}</td>
                <td>{{ ucfirst($module->moduleType->nature) }}</td>
                <td><a href="{{route('admin_module', ['module' => $module])}}" class="btn btn-primary">Modifier</a></td>
                <td><a href="{{route('admin_module_destroy', ['module' => $module])}}" class="btn btn-danger">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
