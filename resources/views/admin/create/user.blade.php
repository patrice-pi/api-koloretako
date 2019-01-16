@extends('admin.layout.app')

@section('content')

    <h1>Création d'un l'utilisateur</h1>

    <form method="POST" action="{{ route('admin_user_store') }}">
        {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="lastname">Nom</label>
                    <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Téléphone</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="zip">Code postal</label>
                    <input type="text" class="form-control" name="zip" value="{{ old('zip') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password" class="control-label">Mot de passe <span>*</span></label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="password-confirm" class="control-label">Confirmation <span>*</span></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-check form-check-inline col-md-2">
                    <input class="form-check-input" type="checkbox" name="admin">
                    <label class="form-check-label" for="admin">
                        Administrateur
                    </label>
                </div>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>

@endsection
