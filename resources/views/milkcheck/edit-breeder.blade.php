@extends('layouts.milkcheck')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier Elveur</li>
        </ol>
    </nav>



    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Modifier Elveur</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                    <form action="{{url('milkcheck/breeders/'.$breeder->id)}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                       
                       
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nom complet *:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('name') is-invalid @enderror" name="name" value="{{$breeder->name}}" placeholder="Mohamed Abdullah" required/>
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
                                <input class="form-control mb-4 mb-md-0  input-default @error('email') is-invalid @enderror" name="email" value="{{$breeder->email}}" placeholder="Mohamed@gmail.com" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">N° De Télephone(optionnel):</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('telephone') is-invalid @enderror " name="telephone" value="{{$breeder->phone}}" placeholder="+2130776443231"/>
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
                                <input class="form-control mb-4 mb-md-0 input-default @error('n_agrement') is-invalid @enderror" name="n_agrement" value="{{$breeder->n_agrement}}" placeholder="13681" required/>
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
                                <input class="form-control mb-4 mb-md-0 input-default @error('delivry_date') is-invalid @enderror" name="delivry_date" type="date" value="{{$breeder->delivry_date}}" data-inputmask="'alias': 'currency'" required/>
                                @error('delivry_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Date d'éxpiration *:</label>
                                <input class="form-control mb-4 mb-md-0 input-default @error('expiration_date') is-invalid @enderror" name="expiration_date" type="date" value="{{$breeder->expiration_date}}" data-inputmask="'alias': 'currency'" required/>
                                @error('expiration_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            
                        </div>

                        <div class="row mb-3">

                     
                            
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1" class="form-label">Collecteur *</label>
								<select class="js-example-basic-single  form-select" name="collector" class="form-control input-default @error('collector') is-invalid @enderror" id="exampleFormControlSelect1" required>
                                   
                                    @foreach ($collectors as $collector)
                                        <option value="{{$collector->id}}" @if ($breeder->collector_id == $collector->id) selected @endif>{{$collector->name}}</option>
                                    @endforeach
                                    @error('collector')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </select>
                               
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection