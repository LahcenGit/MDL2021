@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-10">
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; Inscription</div>
                        <div class="bigtitle" style="color:#1847AD">Inscription pour les Professionnels</div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>

    <form class="form-horizontal checkout" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row">
            <div  class="col-md-6">
                <div id="title-bg">
                    <div class="title">Détails personnels</div>
                </div>
                <h5>Veuillez remplir les champs ci-dessous pour vous inscrire</h5>
                <div class="form-group dob">
                    <div class="col-sm-12">
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" name="name" placeholder="Nom Complet" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6" style="margin-bottom: 8px;">
                        <input type="text" class="form-control @error('entreprise') is-invalid @enderror" name="entreprise" value="{{ old('entreprise') }}" placeholder="Entreprise" required>
                        @error('entreprise')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6" >
                        <select  class="form-control @error('type') is-invalid @enderror" name="type" placeholder="type" required>
                            <option value="" disabled selected>Vous êtes : </option>
                            <option value="Pizzeria" @if (old('type') == 'Pizzeria')selected @endif>Pizzeria</option>
                            <option value="Grossiste"@if (old('type') == 'Grossiste')selected @endif>Grossiste</option>
                            <option value="Orika"@if (old('type') == 'Orika')selected @endif>Client facturé</option>
                        </select>
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Téléphone"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('fax') is-invalid @enderror" name="fax" value="{{ old('fax') }}" placeholder="Fax" >
                        @error('fax')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" placeholder="Adresse" required>
                        @error('adresse')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group dob">
                    <div class="col-sm-12">
                        <select class="form-control @error('wilaya') is-invalid @enderror" name="wilaya" placeholder="Wilaya" required>
                            <option value="" disabled selected>La wilaya : </option>
                            @foreach($wilayas as $wilaya)
                            <option value="{{ $wilaya->name }}" @if(old('wilaya')== $wilaya->name ) selected @endif>{{ $wilaya->name }}</option>
                            @endforeach
                        </select>

                        @error('wilaya')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('RC') is-invalid @enderror" name="RC" value="{{ old('RC') }}" placeholder="RC" required>
                        @error('RC')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('NIF') is-invalid @enderror" name="NIF" value="{{ old('NIF') }}" placeholder="NIF" required>
                        @error('NIF')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

            </div>
              <div  class="col-md-6">

                <div id="title-bg">
                    <div class="title">Détails du compte</div>
                </div>

                <h5>Des informations nécessaires pour votre connexion</h5>
                <div class="form-group dob">
                    <div class="col-sm-12">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @else
                        <span >minimum 8 caractères. </span>
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
