@extends('layouts.milkcheck')
@section('content')

@extends('layouts.milkcheck')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier un paramètre</li>
        </ol>
    </nav>



    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Modifier Paramètre</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                    <form action="{{url('milkcheck/parameters/'.$parameter->id)}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                       
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Name*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('name') is-invalid @enderror" name="name" value="{{$parameter->name}}"   required/>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="exampleFormControlSelect1" class="form-label">Type*</label>
								<select class="js-example-basic-single  form-select" name="type" class="form-control input-default @error('type') is-invalid @enderror" id="exampleFormControlSelect1" required>
                                    <option value="milkcheck" @if($parameter->type == 'milkcheck')selected @endif>Milkcheck</option>
                                    <option value="Admin" @if($parameter->type == 'admin')selected @endif>Admin</option>
                                   
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </select>
                               
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Value:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('value') is-invalid @enderror" name="value" value="{{$parameter->value1}}"  />
                                @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
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

@endsection