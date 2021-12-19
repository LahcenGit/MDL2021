@extends('layouts.dashboard-milkchec')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vendeurs</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">La table des vendeurs</h6>
    <p class="text-muted mb-3">Vous trouvez ici  tous les vendeurs.</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>N°d'agrement</th>
            <th>Date d'éxpédition</th>
            <th>Validation</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($vendeurs as $vendeur)
          <tr>
            <td>{{$vendeur->name}}</td>
            <td>{{$vendeur->email}}</td>
            <td>{{$vendeur->n_agrement}}</td>
            <td>{{$vendeur->date}}</td>
            <td>Expiré</td>
            
            <td>
              <form action="{{url('milkcheck/vendeurs/'.$vendeur->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                  <a href="{{url('milkcheck/vendeurs/'.$vendeur->id.'/edit')}}" class="btn btn-primary shadow btn-xs sharp "><i class="mdi mdi-border-color"></i></a>
                  
                  <button class="btn btn-danger shadow btn-xs sharp "onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="mdi mdi-delete "></i></button>
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
@endsection