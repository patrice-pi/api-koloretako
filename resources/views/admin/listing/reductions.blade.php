@extends('admin.layout.app')

@section('content')

    <h1 class="pb-4 pt-3">Liste des réductions</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" width="30%">Id</th>
            <th scope="col" width="60%">Rate</th>
            <th scope="col" width="20%">Modifier</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reductions as $reduction)
            <tr>
                <td>{{ $reduction->id }}</td>
                <td>{{ $reduction->rates }}%</td>
                <td><a href="{{route('admin_reduction', ['reduction'=> $reduction])}}" class="btn btn-primary">Modifier</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
