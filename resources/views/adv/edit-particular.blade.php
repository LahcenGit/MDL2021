@extends('layouts.dashboard-adv')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier un particulier</li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Détails personnels</h6>
                    <form class="forms-sample" method="POST" action="{{url('adv/particulars/'.$particular->id)}}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                         @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nom complet*:</label>
                                    <input class="form-control mb-4 mb-md-0  input-default " name="name"  value="{{$particular->user->name}}" placeholder="name"  />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Téléphone*:</label>
                                    <input class="form-control mb-4 mb-md-0  input-default " name="phone"  value="{{$particular->phone}}" placeholder="phone"  />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Wilaya:</label>
                                    <select class="form-select" name="wilaya"  class="form-control input-default " id="exampleFormControlSelect1" >
                                        <option value="" disabled selected>La wilaya: </option>
                                        @foreach($wilayas as $wilaya)
                                        <option value="{{ $wilaya->name }}" @if($particular->wilaya == $wilaya->name) selected @endif>{{ $wilaya->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Adresse:</label>
                                    <input class="form-control mb-4 mb-md-0  input-default " name="address"  value="{{$particular->adresse}}" placeholder="adresse" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Email*:</label>
                                    <input class="form-control mb-4 mb-md-0  input-default " name="email"  value="{{$particular->user->email}}" placeholder="email"  />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Mot de passe*:</label>
                                    <input type="password" class="form-control mb-4 mb-md-0  input-default " name="password"  placeholder="mot de passe"  />
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
