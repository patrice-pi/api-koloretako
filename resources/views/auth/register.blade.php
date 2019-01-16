@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <h1 class="text-center text-uppercase my-5">S'inscrire</h1>

            @include('includes.error_form')

            <form class="text-center my-5" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-row">
                    <div class="form-group col-lg-12{{ $errors->has('firstname') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Pseudo <span>*</span></label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-12{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">Adresse Email <span>*</span></label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Mot de passe <span>*</span></label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="control-label">Confirmation <span>*</span></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        S'inscrire
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
