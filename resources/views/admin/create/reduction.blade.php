@extends('admin.layout.app')

@section('content')

    <h1>Création d'une réduction</h1>

    <form>
        <div class="form-group">
            <label for="rate">Rates</label>
            <input type="number" class="form-control" name="rates" value="{{ old('rates') }}">
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>

@endsection