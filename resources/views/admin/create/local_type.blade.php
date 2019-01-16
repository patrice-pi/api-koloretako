@extends('admin.layout.app')

@section('content')

    <h1>Création d'un type de local</h1>

<form method="POST" action="{{ route('admin_local_type_store') }}">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="label">Libellé</label>
            <input type="text" class="form-control" name="label" value="{{ old('label') }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Création</button>
    </form>

@endsection