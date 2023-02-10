@extends('layouts.front')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-4">
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
            <li><a href="{{ asset('/app-particular') }}"  class="myshop">Mes commandes</a></li>
            <li><a href="{{ asset('/app-particular/profil') }}" class="myacc">Mon profil</a></li>
            <li><a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"  class="sign-out">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul><!--small-nav -->
        <div class="clearfix"></div>
        <div class="lines"></div>
    </div>

    <form class="form-horizontal checkout" role="form" method="POST" action="{{url('app-particular/profil/'.Auth::user()->id)}}">
        <input type="hidden" name="_method" value="PUT">
           @csrf
        <div class="row">
            <div class="col-md-12">
                <div id="title-bg">
                    <div class="title">Votre informations</div>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group dob">
                        <div class="col-sm-12">
                            <input type="text" class="form-control"  value="{{ Auth::user()->name }}" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6" style="margin-bottom: 8px;">
                            <input type="text" class="form-control" placeholder="Adresse" value="{{ Auth::user()->particular->adresse }}" name="address" >
                        </div>
                        <div class="col-sm-6">
                           <select class="form-control @error('wilaya') is-invalid @enderror" name="wilaya" placeholder="Wilaya" required>
                                <option value="" disabled selected>La wilaya: </option>
                                @foreach ($wilayas as $wilaya )
                                <option value="{{ $wilaya->name }}" @if(Auth::user()->particular->wilaya == $wilaya->name) selected @endif>{{ $wilaya->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group dob">
                        <div class="col-sm-6">
                            <input type="text" class="form-control"  value="{{ Auth::user()->particular->phone }}" name="phone">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control"  value="{{ Auth::user()->email }}" name="email">
                        </div>
                    </div>
                    <div class="form-group dob">
                        <div class="col-sm-12">
                            <input type="password" class="form-control" placeholder="mot de passe" name="password">
                            <div  style="margin-top: 5px">
                            <span >Laissez le champ vide si vous voulez garder l'ancien. </span>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
        <div>
                 <button type="submit" class="btn btn-default btn-red btn-lg">Enregistrer</button></a>
        </div>



    </form>
    <div class="spacer"></div>
</div>
@endsection
