@extends('admin.layout.app')

@section('content')

    <h1>Création d'un type de module</h1>

    <form method="POST" action="{{ route('admin_module_store') }}">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="label">Libellé</label>
                <input type="text" class="form-control" name="label" value="{{ old('address') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="price">Prix</label>
                <input type="text" class="form-control" name="price" value="{{ old('address') }}">
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="3">{{ old('address') }}</textarea>
        </div>
        <div class="form-group">
            <label for="type">type</label>
            <select class="form-control" name="type_id">
                @foreach($moduleTypes as $moduleType)
                    <option name="moduleType" value='{{ $moduleType->id }}'>{{ $moduleType->nature }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>

@endsection