@extends('admin.layout.app')

@section('content')

    <h1>Modification de "{{ $user->firstname." ".$user->lastname }}"</h1>

    <form method="POST" action="{{ route('admin_user_update', ['user' => $user]) }}">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="lastname">Nom</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}">
            </div>
            <div class="form-group col-md-6">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Téléphone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
            </div>
        </div>
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="city">Ville</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}">
            </div>
            <div class="form-group col-md-6">
                <label for="zip">Code postal</label>
                <input type="text" class="form-control" id="zip" name="zip" value="{{ $user->zip }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" id="admin" name="admin" {{ $user->admin ? 'checked' : '' }}>
                <label class="form-check-label" for="admin">
                    Administrateur
                </label>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between my-3">
            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="" class="btn btn-danger">Supprimer</a>
        </div>
    </form>

@endsection
