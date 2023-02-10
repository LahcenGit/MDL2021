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
                        <div class="bigtitle" style="color:#1847AD">Inscription pour les Particuliers</div>
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
                    <div class="title">Inscription</div>
                </div>
                <h5>Veuillez remplir les champs ci-dessous pour vous inscrire à notre site web</h5>
                <div class="form-group dob">
                    <div class="col-md-6">
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" name="name" placeholder="Nom complet" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}"  placeholder="Téléphone"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-md-6">
                        <select style="margin-bottom: 8px;" class="form-control @error('wilaya') is-invalid @enderror"  name="wilaya" placeholder="Wilaya" required>
                            <option value="" disabled selected>La wilaya: </option>
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
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}"  name="email" placeholder="Email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group dob">
                    <div class="col-md-6">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @else
                        <span >minimum 8 caractères. </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
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
