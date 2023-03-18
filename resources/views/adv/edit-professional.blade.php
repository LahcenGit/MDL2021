@extends('layouts.dashboard-adv')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier un professionnel</li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Détails personnels</h6>
                    <form class="forms-sample" method="POST" action="{{url('adv/professionals/'.$professional->id)}}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                         @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Nom Complet*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('name') is-invalid @enderror" name="name" value="{{ $professional->user->name }}" placeholder="Nom complet" required />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Entreprise*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('entreprise') is-invalid @enderror" name="entreprise" value="{{$professional->entreprise}}" placeholder="Entreprise"required />
                                @error('entreprise')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Type*:</label>
                                <select class="form-select" name="type"  class="form-control input-default " id="exampleFormControlSelect1" required>
                                    <option value=""disabled selected>selectionner le type</option>
                                    <option value="Pizzeria" @if ($professional->type == 'Pizzeria' ) selected @endif >Pizzeria</option>
                                    <option value="Grossiste" @if ($professional->type== 'Grossiste' ) selected @endif >Grossiste</option>
                                    <option value="Superette" @if ($professional->type== 'Superette' ) selected @endif >Supérette</option>
                                    <option value="Orika" @if ($professional->type == 'Orika' ) selected @endif >Autre</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">NIF*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('NIF') is-invalid @enderror" name="NIF" value="{{$professional->NIF}}" placeholder="NIF"required />
                                @error('NIF')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">RC*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('RC') is-invalid @enderror" name="RC" value="{{$professional->RC}}" placeholder="RC"required />
                                    @error('RC')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Téléphone*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('phone') is-invalid @enderror" name="phone" value="{{$professional->phone}}" placeholder="Téléphone" required />
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fax:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('fax') is-invalid @enderror" name="fax" value="{{$professional->fax}}" placeholder="Fax" />
                                @error('fax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Wilayas*:</label>
                                <select class="form-select" name="wilaya"  class="form-control input-default " id="exampleFormControlSelect1">
                                    <option value=""disabled selected>La wilaya:</option>
                                    @foreach($wilayas as $wilaya)
                                    <option value="{{ $wilaya->name }}" @if($professional->wilaya == $wilaya->name) selected @endif>{{ $wilaya->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Adresse*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('adresse') is-invalid @enderror" name="adresse" value="{{$professional->adresse}}" placeholder="Adresse" required/>
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Email*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('email') is-invalid @enderror" name="email" value="{{$professional->user->email}}" placeholder="Email" required />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mot de passe:</label>
                                <input type="password" class="form-control mb-4 mb-md-0  input-default @error('password') is-invalid @enderror" name="password" value="{{old('password')}}" placeholder="mot de passe" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
