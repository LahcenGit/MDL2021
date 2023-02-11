@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bigtitle" style="color:#1847AD">Réinitialisation du mot de passe</div>
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
                    <form class="form-horizontal checkout" method="POST" action="{{ route('password.update') }}">
                        @csrf
                       <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row">
                            <div  class="col-md-12">
                                <div id="title-bg">
                                    <div class="title"></div>
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
                                <div class="form-group dob">
                                    <div class="col-sm-8">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="new-password">
                                         @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="form-group dob">
                                    <div class="col-sm-8">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe" required autocomplete="new-password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default btn-red ">Réinitialisation</button>
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
