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
                            <div class="col-md-8">
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
                            <div class="col-md-8">
                                <label class="form-label">Téléphone*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('phone') is-invalid @enderror" name="phone" value="{{$professional->phone}}" placeholder="Téléphone"  />
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Latitude(optionnel):</label>
                                <input class="form-control mb-4 mb-md-0  input-default " name="latitude" id="latitude" value="{{$professional->latitude}}" placeholder="latitude" />

                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Longitude(optionnel):</label>
                                <input class="form-control mb-4 mb-md-0  input-default" name="longitude" id="longitude" value="{{$professional->longitude}}" placeholder="longitude" />

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Wilayas*:</label>
                                <select class="form-select" name="wilaya"  class="form-control input-default " id="exampleFormControlSelect1">
                                    <option value=""disabled selected>La wilaya:</option>
                                    @foreach($wilayas as $wilaya)
                                    <option value="{{ $wilaya->name }}" @if($professional->wilaya == $wilaya->name) selected @endif>{{ $wilaya->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
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

                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
