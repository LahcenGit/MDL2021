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
            <div  class="col-md-6">
                <div id="title-bg">
                    <div class="title">Détails personnels</div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" class="form-control  @error('nom') is-invalid @enderror" id="name"  name="nom" placeholder="Nom">
                        @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" placeholder="Prénom">
                        @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                
                
                 <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Téléphone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" placeholder="Adresse">
                        @error('adresse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <select class="form-control @error('wilaya') is-invalid @enderror" name="wilaya" placeholder="Wilaya">
                            <option>Wilaya</option>
                            <option value="tlemcen">1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        
                        @error('wilaya')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="col-sm-6">
                        <select class="form-control @error('commune') is-invalid @enderror" name="commune" >
                            <option>Commune</option>
                            <option value="oudjlida">1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>   
                        @error('commune')
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
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe">
                    </div>
                </div>
                <button type="submit" class="btn btn-default btn-red">S'inscrire</button>
            </div>

            

            
        </div>
    </form>
    <div class="spacer"></div>
</div>
@endsection