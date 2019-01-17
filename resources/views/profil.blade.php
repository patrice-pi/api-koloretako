@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-lg-6">

                <h1 class="text-center">Mon profil</h1>

                @include('includes.error_form')

                <form class="text-center my-5" method="POST" action="{{ route('update') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="control-label">Pseudo <span>*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' has-error' : '' }}" name="name" value="{{ $user->name }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label">Adresse Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autofocus>
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
