@extends('admin.layout.app')

@section('content')

    <h1>Modification du type de local {{ $localType->id }}</h1>

    <form method="POST" action="{{ route('admin_local_type_update', ['localType' => $localType]) }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="label">Libellé</label>
            <input type="text" class="form-control" name="label" value="{{ $localType->label }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="3">{{ $localType->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>

@endsection