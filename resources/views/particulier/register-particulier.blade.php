@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="bread"><a href="#">Accueil</a> &rsaquo; Inscription</div>
                        <div class="bigtitle">Inscription pour les Particuliers</div>
                    </div>
                    <div class="col-md-3 col-md-offset-5">
                        <button class="btn btn-default btn-yellow btn-lg">Particulier</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <form class="form-horizontal checkout" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row">
            <div  class="col-md-12">
                <div id="title-bg">
                    <div class="title">Détails compte</div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"  name="name" placeholder="Nom complet" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Téléphone"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <select class="form-control @error('wilaya') is-invalid @enderror" name="wilaya" placeholder="Wilaya" required>
                            <option>Wilaya</option>
                            @foreach($wilayas as $wilaya)
                            <option value="{{ $wilaya->name }}" @if(old('wilaya')== $wilaya->name ) selected @endif>{{ $wilaya->name }}</option>
                            @endforeach
                        </select>
                        @error('wilaya')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required>
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

                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
                    </div>
                    <input type="hidden"  name="check" value="customer">
                </div>
                <button type="submit" class="btn btn-default btn-red">S'inscrire</button>
            </div>
        </div>
    </form>
    <div class="spacer"></div>
</div>
@endsection
