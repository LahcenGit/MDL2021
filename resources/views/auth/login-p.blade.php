@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; connexion</div>
                        <div class="bigtitle" style="color:#1847AD">Connexion</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <form class="form-horizontal checkout" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row">
            <div  class="col-md-6">
                <div id="title-bg">
                    <div class="title" >Détails du compte</div>
                </div>

                <h5>Entrez vos informations de connexion pour accéder à votre compte.</h5>

                @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <div class="form-group dob" style=""> 
                   <div class="col-sm-12">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="username" placeholder="Email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-12">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-12">
                        <div class="single-checkbox ">
                            <div class="checkbox-inline">
                                <input class="check-input" type="checkbox" id="check15" name="remember_me">
                                <label class="checkbox-label" for="check15" style="font-weight:300"> Se souvenir de moi </label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-default btn-red ">Se connecter</button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link"  style="color:#1847AD" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif
            </div>
            <div  class="col-md-6">
                <div id="title-bg">
                    <div class="title">Inscription</div>
                </div>

                <h5>Si vous n'avez pas de compte, veuillez vous inscrire pour accéder à nos services</h5>
                <div class="form-group">
                    <div class="col-sm-12">
                        <ul class="small-menu"><!--small-nav -->
                            <li style="background-color: #DADFE2; padding:20px;"><a  href="{{ url('/register-particular') }}" class="myacc">Particulier</a></li>
                            <li style="background-color: #DADFE2; padding:20px;"><a  href="{{ url('/register-professional') }}" class="mypro">Professionnel</a></li>
                        </ul><!--small-nav -->
                    </div>
                </div>


            </div>

            </div>
        </div>
    </form>
    <div class="spacer"></div>
</div>
@endsection
