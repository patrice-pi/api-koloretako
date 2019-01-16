@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-lg-6">

                <h1 class="text-center">Mon profil</h1>

                @include('includes.error_form')

                <form class="text-center my-5" method="POST" action="{{ route('update') }}">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="firstname" class="control-label">Nom <span>*</span></label>
                            <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' has-error' : '' }}" name="firstname" value="{{ $user->firstname }}" required autofocus>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="lastname" class="control-label">Prénom <span>*</span></label>
                            <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' has-error' : '' }}" name="lastname" value="{{ $user->lastname }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="phone" class="control-label">Téléphone</label>
                            <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' has-error' : '' }}" name="phone" value="{{ $user->phone }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="address" class="control-label">Adresse</label>
                            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' has-error' : '' }}" name="address" value="{{ $user->address }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-lg-8">
                            <label for="city" class="control-label">Ville</label>
                            <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' has-error' : '' }}" name="city" value="{{ $user->city }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="zip" class="control-label">Code Postal</label>
                            <input id="zip" type="text" class="form-control{{ $errors->has('zip') ? ' has-error' : '' }}" name="zip" value="{{ $user->zip }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label">Nouveau mot de passe</label>
                        <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" name="password">
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="control-label">Confirmation</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Modifier mon profil
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
