@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-5">
                        <div class="bread"><a href="#">Accueil</a> &rsaquo; Inscription</div>
                        <div class="bigtitle">Inscription pour les Professionnels</div>
                    </div>
                    <div class="col-md-3 col-md-offset-5">
                        <button class="btn btn-default btn-red btn-lg">Professionnel</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <form class="form-horizontal checkout" method="POST" action="{{ route('register') }}">
        @csrf

             @if (count($errors) > 0)
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="row">
            <div  class="col-md-6">
                <div id="title-bg">
                    <div class="title">Détails personnels</div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" class="form-control  @error('first_name') is-invalid @enderror" id="name"  name="first_name" placeholder="Nom" required>
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="prenom" name="last_name" placeholder="Prénom" required>
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control @error('entreprise') is-invalid @enderror" name="entreprise" placeholder="Entreprise" required>
                        @error('entreprise')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Téléphone" required>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('fax') is-invalid @enderror" name="fax" placeholder="Fax" required>
                        @error('fax')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" placeholder="Adresse" required>
                        @error('adresse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group dob">
                    <div class="col-sm-12">
                        <select class="form-control @error('wilaya') is-invalid @enderror" name="wilaya" placeholder="Wilaya" required>
                            <option>Wilaya</option>
                            @foreach($wilayas as $wilaya)
                            <option value="{{ $wilaya->name }}">{{ $wilaya->name }}</option>
                            @endforeach
                        </select>

                        @error('wilaya')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('RC') is-invalid @enderror" name="RC" placeholder="RC" required>
                        @error('RC')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('NIF') is-invalid @enderror" name="NIF" placeholder="NIF" required>
                        @error('NIF')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

            </div>
              <div  class="col-md-6">

                <div id="title-bg">
                    <div class="title">Détails du compte</div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-12">
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

                    <input type="hidden"  name="check" value="pro">
                </div>
                <button type="submit" class="btn btn-default btn-red">S'inscrire</button>
            </div>




        </div>
    </form>
    <div class="spacer"></div>
</div>
@endsection
