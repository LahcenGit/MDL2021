@extends('layouts.milkcheck')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">paramètres</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">La table des paramètres</h6>
    <a href="{{url('/milkcheck/parameters/create')}}" type="button"  class="btn btn-primary mt-3">Ajouter</a>
    <p class="text-muted mb-3">Vous trouvez ici  tous les paramètres.</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
           
            <th>Name</th>
            <th>Type</th>
            <th>Value</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($parameters as $parameter)
          <tr>
           
            <td>{{$parameter->name}}</td>
            <td>{{$parameter->type}}</td>
            <td>{{$parameter->value1}}</td>
            
            <td>
              <form action="{{url('milkcheck/parameters/'.$parameter->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                  <a href="{{url('milkcheck/parameters/'.$parameter->id.'/edit')}}" class="btn btn-secondary shadow btn-xs sharp " style="margin-right: 3px;"><i class="mdi mdi-border-color"></i></a>
                  <button type="submit" onclick="return confirm('Vous voulez vraiment supprimer?')" class="btn btn-danger shadow btn-xs sharp" ><i class="mdi mdi-delete "></i></button>
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