@extends('layouts.dashboard-admin')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter produit</li>
        </ol>
    </nav>



    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ajouter Un Nouveau Produit</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                    <form class="forms-sample" method="POST" action="{{url('/dashboard-admin/produits')}}" enctype="multipart/form-data">
                        @csrf 
                       
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Designation:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('designation') is-invalid @enderror" name="designation" value="{{old('designation')}}" placeholder="designation" />
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            
                        </div>
                        <label>Prix:</label>

                                
                                <div class="input-group mb-3 col-4 input-info">
                                 
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text"  class="form-control input-default @error('prix') is-invalid @enderror"  name="prix" value="{{old('prix')}}" placeholder="prix">
                                    @error('prix')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                       
                       
                        
                </div>
            </div>
        </div>

    
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Les catégories</h6>
                    <p class="text-muted mb-3">Selectionnez Une Catégorie</p>
                   
                    <div class="mb-3">
                        <div class="form-check mb-2">
                        
                            <label class="form-check-label" for="checkDefault">
                                @include('categories')
                            </label>
                        </div>
                 
                  </div>
                  <div class=" text-center">
                  <button type="" class="btn btn-primary mt-3">Ajouter catégorie</button>
                  </div>
              </div>
            </div>
        </div>

        

        
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Description</h4>
                        <p class="text-muted mb-3">Read the <a href="https://www.tiny.cloud/docs/" target="_blank"> Official TinyMCE Documentation </a>for a full list of instructions and other options.</p>
                        <textarea class="form-control" name="description" value="{{old('description')}}" id="tinymceExample" rows="10"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Image principale</h4>
                       
                        <div class="basic-form custom_file_input">
                            <div class="input-group mb-3">
    
                                <label for="file-upload" class="custom-file-upload">
                                    <i class=" mdi mdi-cloud-upload"></i> Ajouter l'image
                                </label>
                                <input id="file-cloud-upload" class="upload-image" type="file" onchange="loadFile(event)" name="photo" />
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               
                         
                            </div>
                            <img id="output">
                           
                         </div>
                     </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12">
             <div class="card">
                   
            <div class="card-body text-center">
              <button class="btn btn-primary" type="submit">Ajouter Le produit</button>
            </div>
             </div></div>
   </form>
</div>
</div>
@endsection