@extends('admin.layout.app')

@section('content')

    <h1>Modification de "{{ $module->label }}"</h1>

    <form method="POST" action="{{ route('admin_module_update', ['module' => $module]) }}">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="label">Libellé</label>
                <input type="text" class="form-control" name="label" value="{{ $module->label }}">
            </div>
            <div class="form-group col-md-6">
                <label for="price">Prix</label>
                <input type="text" class="form-control" name="price" value="{{ $module->price }}">
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="3">{{ $module->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="type">type</label>
            <select class="form-control" name="type_id">
                @foreach($moduleTypes as $moduleType)
                    @if($moduleType->id == $module->type_id)
                        <option name="moduleType" value='{{ $moduleType->id }}' selected="selected">{{ $moduleType->nature }}</option>
                    @else
                        <option name="moduleType" value='{{ $moduleType->id }}'>{{ $moduleType->nature }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="" class="btn btn-danger">Supprimer</a>
    </form>

@endsection
