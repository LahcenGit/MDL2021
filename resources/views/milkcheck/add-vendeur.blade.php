@extends('layouts.milkcheck')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter vendeur</li>
        </ol>
    </nav>



    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ajouter Vendeur</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                    <form class="forms-sample" method="POST" action="{{url('/milkcheck/vendeurs')}}" enctype="multipart/form-data">
                        @csrf 
                       
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nom complet *:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="Mohamed Abdullah" />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Email(optionnel):</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="Mohamed@gmail.com" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">N° De Telephone *:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('telephone') is-invalid @enderror" name="telephone" value="{{old('telephone')}}" placeholder="+2130776443231" />
                                @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">N° d'agrément *:</label>
                                <input class="form-control mb-4 mb-md-0 input-default @error('n_agrement') is-invalid @enderror" name="numero" value="{{old('numero')}}" placeholder="13681"/>
                                @error('n_agrement')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Date d'éxpédition *:</label>
                                <input class="form-control mb-4 mb-md-0 input-default @error('date_expedition') is-invalid @enderror" name="date_expedition" type="date" value="{{old('date_expedition')}}" data-inputmask="'alias': 'currency'"/>
                                @error('date_expedition')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            
                            <div class="col-md-3">
                                <label class="form-label">Date d'éxpiration *:</label>
                                <input class="form-control mb-4 mb-md-0 input-default @error('date_expiration') is-invalid @enderror" name="date_expiration" type="date" value="{{old('date_expiration')}}" data-inputmask="'alias': 'currency'"/>
                                @error('date_expiration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            
                        </div>
                        <button class="btn btn-primary" type="submit">Ajouter Le vendeur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection