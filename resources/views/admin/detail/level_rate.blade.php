@extends('admin.layout.app')

@section('content')


    <h1>Modification du ratio de niveau {{ $levelRate->id }}</h1>

    <form method="POST" action="{{ route('admin_level_rate_store', ['levelRate' => $levelRate]) }}">
    {{ csrf_field() }}

        <div class="form-group">
            <label for="rate">Rate</label>
            <input type="text" class="form-control" name="rate" value="{{ $levelRate->rates }}">
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>

@endsection
