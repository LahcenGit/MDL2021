@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="bread"><a href="#">Accueil</a> &rsaquo; Authentification</div>
                        <div class="bigtitle">Authentification</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <form class="form-horizontal checkout" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row">
            <div  class="col-md-12">
                <div id="title-bg">
                    <div class="title">Détails compte</div>
                </div>
                <div class="form-group dob">
                   <div class="col-sm-6">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="username" placeholder="Email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <div class="single-checkbox ">
                            <div class="checkbox-inline">
                                <input class="check-input" type="checkbox" id="check15" name="remember_me">
                                <label class="checkbox-label" for="check15"> Se souvenir de moi </label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-default btn-red ">Se connecter</button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
    <div class="spacer"></div>
</div>
@endsection
