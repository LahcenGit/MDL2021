@extends('layouts.milkcheck')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Milkcheck</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter un employé</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-9 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ajouter employé</h6>
                    <form class="forms-sample" method="POST" action="{{url('/milkcheck/workers')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nom complet *:</label>
                                <input type="text" class="form-control mb-4 mb-md-0  input-default @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="Mohamed Abdullah"  required/>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date de naissance*:</label>
                                <input type="date" class="form-control mb-4 mb-md-0  input-default @error('date_birth') is-invalid @enderror" name="date_birth" value="{{old('date_birth')}}"   required/>
                                    @error('date_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Email(optionnel):</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="Mohamed@gmail.com" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">N° Telephone (optionnel):</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="+2130776443231" />
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Adresse (optionnel):</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" placeholder="Adresse" />
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Poste* :</label>
                                <input class="form-control mb-4 mb-md-0 input-default @error('post') is-invalid @enderror" name="post" value="{{old('post')}}" placeholder="post" required/>
                                @error('post')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
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
