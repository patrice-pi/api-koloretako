@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <h1 class="text-center text-uppercase my-5">Se connecter</h1>

            @include('includes.error_form')

            <form class="text-center my-5" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Adresse Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Mot de passe</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary rounded-0">
                        Se connecter
                    </button>
                </div>

                <div class="form-group">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
