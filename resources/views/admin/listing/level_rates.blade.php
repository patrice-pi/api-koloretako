@extends('admin.layout.app')

@section('content')

    {{--
        Ajouter chaque ration de niveau + les liens modification/suppresion
        Ne pas oublier de supprimer la class user pr test, et ce commentaire.
    --}}


    <h1>Liste des ratios de niveaux</h1>
    <hr>
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="30%">Id</th>
                <th scope="col" width="60%">Rate</th>
                <th scope="col" width="20%">Modifier</th>
            </tr>
            </thead>
            <tbody>
            @foreach($levelRates as $levelRate)
                <tr>
                    <td>{{ $levelRate->id }}</td>
                    <td>{{ $levelRate->rates }}</td>
                    <td><a href="{{route('admin_level_rate_update', ['id' => $levelRate])}}" class="btn btn-primary">Modifier</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
