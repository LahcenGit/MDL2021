@extends('layouts.milkcheck')


@section('content')

<div class="page-content">
    
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modifier profil</li>
            </ol>
        </nav>

        

        <div class="container-fluid col-md-8 pt-5 "  id="app">
      
          
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