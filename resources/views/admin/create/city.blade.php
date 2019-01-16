@extends('admin.layout.app')

@section('content')

    <h1>Création d'une ville</h1>

    <form method="POST" action="{{ route('admin_city_store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="label">Libellé</label>
            <input type="text" class="form-control" name="label" value="{{ old('label') }}">
        </div>
        <div class="form-row">
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" name="active">
                <label class="form-check-label" for="active">
                    Actif
                </label>
            </div>
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>

@endsection
