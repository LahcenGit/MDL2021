@extends('layouts.milkcheck')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">eleveurs</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">La table des eleveurs</h6>
    <p class="text-muted mb-3">Vous trouvez ici  tous les eleveurs.</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Telephone</th>
            <th>N°d'agrement</th>
            <th>Date d'éxpédition</th>
            <th>Date d'éxpiration</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($breeders as $breeder)
          <tr>

            <td>{{$loop->iteration}}</td>
            <td>{{$breeder->name}}</td>
            <td>{{$breeder->phone}}</td>
            <td>{{$breeder->n_agrement}}</td>
            <td>{{$breeder->delivry_date}}</td>
            <td>{{$breeder->expiration_date}}</td>
            <td>
              <form action="{{url('milkcheck/breeders/'.$breeder->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                  <a href="{{url('milkcheck/breeders/'.$breeder->id.'/edit')}}" class="btn btn-secondary shadow btn-xs sharp " style="margin-right: 3px;"><i class="mdi mdi-border-color"></i></a>
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