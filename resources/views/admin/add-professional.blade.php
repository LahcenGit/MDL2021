@extends('layouts.dashboard-admin')
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
                    <h6 class="card-title">Détails personnels</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                    <form class="forms-sample" method="POST" action="{{url('/dashboard-admin/professionals')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Nom Complet*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="Nom complet" />
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
                                <input class="form-control mb-4 mb-md-0  input-default @error('entreprise') is-invalid @enderror" name="name" value="{{old('entreprise')}}" placeholder="Entreprise" />
                                @error('entreprise')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Type*:</label>
                                <select class="form-select" name="type"  class="form-control input-default " id="exampleFormControlSelect1">
                                    <option value="0">select</option>
                                    <option value="Pizzeria" @if (  old('type') == 'Pizzeria' ) selected @endif >Pizzeria</option>
                                    <option value="Grossiste" @if (  old('type')== 'Grossiste' ) selected @endif >Grossiste</option>
                                    <option value="Orika" @if (  old('type') == 'Orika' ) selected @endif >Orika</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Téléphone*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="Téléphone" />
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fax:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('fax') is-invalid @enderror" name="name" value="{{old('fax')}}" placeholder="Fax" />
                                @error('fax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Adresse*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('adresse') is-invalid @enderror" name="adresse" value="{{old('adresse')}}" placeholder="Adresse" />
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Wilayas*:</label>
                                <select class="form-select" name="wilaya"  class="form-control input-default " id="exampleFormControlSelect1">
                                    <option value="0">select</option>
                                    @foreach($wilayas as $wilaya)
                                    <option value="{{ $wilaya->name }}">{{ $wilaya->name }}</option>
                                    @endforeach
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
