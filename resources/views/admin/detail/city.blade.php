@extends('admin.layout.app')

@section('content')

    {{--
        Ajouter le local, mais aussi envoyer la liste des types.
    --}}

    <h1>Modification de "{{ $city->label }}"</h1>

    <form method="POST" action="{{ route('admin_city_update', ['city' => $city]) }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="label">Libellé</label>
            <input type="text" class="form-control" name="label" value="{{ $city->label }}">
        </div>
        <div class="form-row">
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" name="active" {{ $city->active ? 'checked' : '' }}>
                <label class="form-check-label" for="active">
                    Actif
                </label>
            </div>
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="" class="btn btn-danger">Supprimer</a>
    </form>

@endsection
