@extends('layouts.dashboard-adv')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter categorie</li>
        </ol>
    </nav>



    <div class="row d-flex justify-content-center">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ajouter Categorie</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                    <form class="forms-sample" method="POST" action="{{url('/adv/categories')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Designation:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('designation') is-invalid @enderror" name="designation" value="{{old('designation')}}" placeholder="designation" />
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label for="exampleFormControlSelect1" class="form-label">Liste des categories</label>
								<select class="form-select" name="categorie"  class="form-control input-default  @error('categorie') is-invalid @enderror" id="exampleFormControlSelect1">
                                    <option value="0">select</option>
                                    @foreach ($categories as $categorie)
                                        <option  value="{{$categorie->id}}" @if (old('categorie') == $categorie->id ) selected @endif > {{ $categorie->designation}}</option>
                                    @endforeach
                                @error('vendeur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
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
