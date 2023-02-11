@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bread"><a href="#">Accueil</a> &rsaquo; Mot de passe oublié</div>
                        <div class="bigtitle" style="color:#1847AD">Mot de passe oublié</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            Nous avons envoyé votre lien de réinitialisation de mot de passe par e-mail !
                        </div>
                    @endif
                    <form class="form-horizontal checkout" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row">
                            <div  class="col-md-12">
                                <div >
                                    <h5>Indiquez votre email pour recevoir un nouveau mot de passe</h5>
                                </div>
                                <div class="form-group dob">
                                   <div class="col-sm-8">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default btn-red ">Envoyer</button>
                            </div>
                        </div>
                    </form>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
