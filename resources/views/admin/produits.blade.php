@extends('layouts.dashboard-admin')

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Produits</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
      
    <h6 class="card-title">La table des produits</h6>
   
    <p class="text-muted mb-3">Vous trouvez ici  tous les produits.</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Catégorie</th>
            <th>Designation</th>
            <th>Prix</th>
            
            <th>Action</th>
          </tr>
        </thead>
          <tbody>
            @foreach($produits as $produit)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$produit->categorie->designation}}</td>
            <td>{{$produit->designation}}</td>
            <td>{{number_format($produit->prix, 2)}} DA</td>
           
           
            <td>
              <form action="" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                    <a href="" class="btn btn-primary shadow btn-xs sharp "><i class="mdi mdi-border-color"></i></a>
                   
                    <button class="btn btn-danger shadow btn-xs sharp "onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="mdi mdi-delete "></i></button>
                </div>
              </form>	
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div>   

@endsection