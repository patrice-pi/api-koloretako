@extends('admin.layout.app')

@section('content')

    {{--
        Ajouter le local, mais aussi envoyer la liste des types.
    --}}

    <h1>Modification de la reduction du level {{ $reduction->id }}</h1>

    <form method="POST" action={{route('admin_reduction_update', ["reduction" => $reduction])}}>
        {{ csrf_field() }}
        <div class="form-group">
            <label for="rate">Rate</label>
            <input type="number" class="form-control" name="rates" value="{{ $reduction->rates }}">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>

@endsection
