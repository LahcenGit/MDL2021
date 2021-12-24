@extends('layouts.milkcheck')

<style>

    .image-preview{
      
      border : 1px solid #29324C !important;
      margin: 10px 10px 10px 0px;
      display : flex; 
      align-items: center;
      justify-content: center;
      overflow:hidden;
      border-radius:100px;
        width:150px;
        height:150px;
       
        
    }
    
    .image-preview-image{
    
     width: 100%; 
     height: 100%;
     border-radius:50px;
     
     border-radius:50px;
  
       
    }
    </style>
@section('content')

<div class="page-content">
    
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modifier profil</li>
            </ol>
        </nav>

        

        <div class="container-fluid col-md-6 pt-5 "  id="app">
      
          
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Merci de remplir les champs</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{url('milkcheck/profil/'.$user->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="card-body" id="hiddens">


                  <div class="d-flex justify-content-center ">
                  <div class="form-group ">
                    <div class="mb-3">
                    <div class="image-preview " id="slider">
                        @if ($user->image)
                        <img src="{{Storage::url($user->image)}}"
                        class="thumb-lg img-circle" alt="img"></a>
                    @else
                     <img id="blah" src="https://www.chanelrenovation.fr/wp-content/uploads/2019/08/neutre.jpg" class="image-preview-image"lt="profile">
                     @endif
                    </div>
                      
                        <input   id="imgInp" type="file"  name="image"   class="file-upload-default">

                    </div>
                  </div>
                    </div>

                  <div class="col-md-12">
                      <div class="mb-3">
                    <label for="exampleInputTitre">Nom</label>
                    <div >
                        
                        <input id="name" placeholder="Entrer le nom" type="text"  class="form-control mb-4 mb-md-0 input-default @error('name') is-invalid @enderror" value="{{$user->name}}"name="name"  required >

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  </div>
                   <div class="col-md-12">
                       <div class="mb-3">
                    <label for="exampleInputTitre">Email</label>
                    <div >
                        
                        <input id="email" placeholder="Entrer l'email" type="email"  class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}"name="email"  required >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                   </div>
                    <div class="col-md-12">
                        
                            <label for="password">Un nouveau mot de passe ? <p style="font-size: 15px; font-weight:450; margin-bottom : -2px;">(Laissez le champ vide si vous voulez garder l'ancien)</p></label>
                         
                            <div>
                                <input id="password" placeholder="Saisir le nouveau mot de passe" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                
                       
                   <div class="card-footer">
                  <button type="submit" class="btn btn-success pl-4 pr-4">Enregistrer</button>
                </div>
              </form>
            </div>

  
</div>
@endsection