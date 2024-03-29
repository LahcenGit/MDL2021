@extends('layouts.dashboard-adv')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter un professionnel</li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Détails personnels</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                    <form class="forms-sample" method="POST" action="{{url('adv/professionals')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Nom Complet*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="Nom complet" required />
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
                                <input class="form-control mb-4 mb-md-0  input-default @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="Téléphone"  />
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
                                <input class="form-control mb-4 mb-md-0  input-default " name="latitude" id="latitude" value="{{old('latitude')}}" placeholder="latitude" />

                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Longitude(optionnel):</label>
                                <input class="form-control mb-4 mb-md-0  input-default" name="longitude" id="longitude" value="{{old('longitude')}}" placeholder="longitude" />

                            </div>


                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Wilaya*:</label>
                                <select class="form-select" name="wilaya"  class="form-control input-default " id="exampleFormControlSelect1" required>
                                    <option value="" disabled selected>La wilaya: </option>
                                    @foreach($wilayas as $wilaya)
                                    <option value="{{ $wilaya->name }}" @if(old('wilaya')== $wilaya->name) selected @endif>{{ $wilaya->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Type*:</label>
                                <select class="form-select" name="type"  class="form-control input-default " id="exampleFormControlSelect1" required>
                                    <option value="" disabled selected>Type: </option>
                                    <option value="Pizzeria" @if(old('type')== 'Pizzeria') selected @endif>Pizzeria</option>
                                    <option value="Grossiste" @if(old('type')== 'Grossiste') selected @endif>Grossiste</option>
                                    <option value="Superette" @if(old('type')== 'Superette') selected @endif>Supérette</option>
                                    <option value="Orika" @if(old('type')== 'Orika') selected @endif>Autre</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
