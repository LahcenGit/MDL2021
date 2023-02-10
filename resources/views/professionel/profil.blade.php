@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-10">
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; Profile</div>
                        <div class="bigtitle" style="color:#1847AD">Profile</div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <ul class="small-menu"><!--small-nav -->
            <li><a href="{{ asset('/app-professional') }}"  class="myshop">Mes commandes</a></li>
            <li><a href="{{ asset('/app-professional/profil') }}" class="myacc">Mon profil</a></li>
            <li><a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"  class="sign-out">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul><!--small-nav -->
        <div class="clearfix"></div>
        <div class="lines"></div>
    </div>

    <form class="form-horizontal checkout" role="form" method="POST" action="{{url('app-professional/profil/'.Auth::user()->id)}}">
        <input type="hidden" name="_method" value="PUT">
           @csrf
        <div class="row">
            <div  class="col-md-6">
                <div id="title-bg">
                    <div class="title">Détails personnels</div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-12">
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" value="{{ Auth::user()->name }}" name="name" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6" style="margin-bottom: 8px;">
                        <input type="text" class="form-control @error('entreprise') is-invalid @enderror" name="entreprise" value="{{ Auth::user()->professional->entreprise }}" placeholder="Entreprise" required>
                        @error('entreprise')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6" >
                        <select  class="form-control @error('type') is-invalid @enderror" name="type" placeholder="type" required>
                            <option value="" disabled selected>Vous êtes : </option>
                            <option value="Pizzeria" @if (Auth::user()->professional->type == 'Pizzeria')selected @endif>Pizzeria</option>
                            <option value="Grossiste"@if (Auth::user()->professional->type == 'Grossiste')selected @endif>Grossiste</option>
                            <option value="Orika"@if (Auth::user()->professional->type == 'Orika')selected @endif>Client facturé</option>
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
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->professional->phone }}" placeholder="Téléphone"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('fax') is-invalid @enderror" name="fax" value="{{ Auth::user()->professional->fax }}" placeholder="Fax" >
                        @error('fax')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ Auth::user()->professional->adresse }}"  required>
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
                            <option value="{{ $wilaya->name }}" @if(Auth::user()->professional->wilaya == $wilaya->name ) selected @endif>{{ $wilaya->name }}</option>
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
                        <input type="text" class="form-control @error('RC') is-invalid @enderror" name="RC" value="{{ Auth::user()->professional->RC }}"  required>
                        @error('RC')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('NIF') is-invalid @enderror" name="NIF" value="{{Auth::user()->professional->NIF }}"  required>
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
                <div class="form-group dob">
                    <div class="col-sm-12">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}"  required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-12">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </div>
                <div  style="margin-top: 5px">
                    <span >Laissez le champ vide si vous voulez garder l'ancien. </span>
                </div>
                <button type="submit" class="btn btn-default btn-red" style="margin-top: 5px">Enregistrer</button>
            </div>
        </div>
    </form>
    <div class="spacer"></div>
</div>
@endsection
