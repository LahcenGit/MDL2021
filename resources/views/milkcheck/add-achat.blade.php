@extends('layouts.dashboard-milkchec')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter achat</li>
        </ol>
    </nav>


    @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
       Svp ! Corrigez les erreurs suivantes : 
       <div class="mb-2"></div>
    <div class="error">
        <ul class="ml-2">
            @foreach ($errors->all() as $error)
                <li style="font-weight:100; ">- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ajouter Achat</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                    <form class="forms-sample" method="POST" action="{{url('/milkcheck/achats')}}" enctype="multipart/form-data">
                        @csrf 
                       
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1" class="form-label">Vendeur</label>
								<select class="form-select" name="vendeur"  class="form-control input-default  @error('vendeur') is-invalid @enderror" id="exampleFormControlSelect1">
                                    <option value="0">select</option>
                                    @foreach ($vendeurs as $vendeur)
                                        <option  value="{{$vendeur->id}}" @if (old('vendeur') == $vendeur->id ) selected @endif > {{ $vendeur->name}}</option>
                                    @endforeach
                                @error('vendeur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                                </select>
                               
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <label class="form-label">Quantité:</label>
                                <input class="form-control mb-4 mb-md-0 input-default @error('qte') is-invalid @enderror"type="number" name="qte" value="{{old('qte')}}" placeholder="0" />
                                @error('qte')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1" class="form-label">Déstination</label>
								<select class="form-select" name="destination" class="form-control input-default @error('destination') is-invalid @enderror" id="exampleFormControlSelect1">
                                    <option value="0">select</option>
                                    <option value="fromage" @if (old('destination') == "fromage") selected @endif>Frommage</option>
                                    <option value="lait" @if (old('destination') == "lait") selected @endif>Lait</option>
                                    @error('destination')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                                </select>
                               
                            </div>
                        </div>
                            <div class="row mb-3">
                                <div class="col-md-1">
                                    <label class="form-label">F:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteF') is-invalid @enderror" value="{{old('qteF')}}" id="inputF" name="qteF" placeholder="0" />
                                    @error('qteF')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">D:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteD') is-invalid @enderror" value="{{old('qteD')}}" id="inputD" name="qteD" placeholder="0" />
                                    @error('qteD')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">C:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteC') is-invalid @enderror" value="{{old('qteC')}}" name="qteC" placeholder="0" />
                                    @error('qteC')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">S:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteS') is-invalid @enderror" value="{{old('qteS')}}" name="qteS" placeholder="0" />
                                    @error('qteS')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">P:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteP') is-invalid @enderror" value="{{old('qteP')}}" name="qteP" placeholder="0" />
                                    @error('qteP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">W:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteW') is-invalid @enderror" value="{{old('qteW')}}" name="qteW" placeholder="0" />
                                    @error('qteW')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">L:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteL') is-invalid @enderror" value="{{old('qteL')}}" name="qteL" placeholder="0" />
                                    @error('qteL')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">T:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteT') is-invalid @enderror"value="{{old('qteT')}}" name="qteT" placeholder="0" />
                                    @error('qteT')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">FP:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteFP') is-invalid @enderror" value="{{old('qteFP')}}" name="qteFP" placeholder="0" />
                                    @error('qteFP')
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