@extends('layouts.dashboard-milkchec')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Achats</li>
        </ol>
    </nav>

    <div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">La table des achats</h6>
    <p class="text-muted mb-3">Vous trouvez ici  tous les achats.</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Vendeur</th>
            <th>destination</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($achats as $achat)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$achat->vendeur->name}}</td>
            <td>{{$achat->destination}}</td>
            <td>{{$achat->created_at}}</td>
            
            <td>
                <div class="d-flex">
                    <a href="#" class="btn btn-primary shadow btn-xs sharp "><i class="mdi mdi-border-color"></i></a>
                    <a href="#" data-id="{{$achat->id}}" class="btn btn-success shadow btn-xs sharp mr-1 show-achat" ><i class="mdi mdi-border-color"></i></a>
                    <a href="#" class="btn btn-danger shadow btn-xs sharp "><i class="mdi mdi-delete "></i></a>
                </div>	
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
<div id="modal-achat">

</div>
@endsection