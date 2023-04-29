@extends('layouts.dashboard-commercial')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter un professionnel</li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Détails professionels</h6>
                    <form class="forms-sample" method="POST" action="{{url('/commercial/professionals/'.$professional->id)}}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                         @csrf
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Nom Complet*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('name') is-invalid @enderror" name="name" value="{{$professional->user->name}}" placeholder="Nom complet" required />
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
                                <input class="form-control mb-4 mb-md-0  input-default @error('phone') is-invalid @enderror" name="phone" value="{{$professional->phone}}" placeholder="Téléphone" required />
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Position GPS(optionnel):</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('position_gps') is-invalid @enderror" name="position_gps" value="{{$professional->gps}}" placeholder="position gps" />
                                @error('position_gps')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Wilaya*:</label>
                                <select class="form-select" name="wilaya"  class="form-control input-default " id="exampleFormControlSelect1" required>
                                    <option value="" disabled selected>La wilaya: </option>
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
                                    <option value="" disabled selected>Type: </option>
                                    <option value="Pizzeria" @if($professional->type == 'Pizzeria') selected @endif>Pizzeria</option>
                                    <option value="Grossiste" @if($professional->type == 'Grossiste') selected @endif>Grossiste</option>
                                    <option value="Superette" @if($professional->type == 'Superette') selected @endif>Supérette</option>
                                    <option value="Orika" @if($professional->type == 'Orika') selected @endif>Autre</option>
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
