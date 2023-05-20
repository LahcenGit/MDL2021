@extends('layouts.milkcheck')
@section('content')
<style>
    .btn{
        padding: 0.4rem 0.4rem !important;
    }

</style>
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">collecteurs</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">La table des collecteurs</h6>
    <p class="text-muted mb-3">Vous trouvez ici  tous les collecteurs.</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>N° De Telephone</th>
            <th>N°d'agrement</th>
            <th>Date d'éxpédition</th>
            <th>Date d'éxpiration</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($collectors as $collector)
          <tr>
            <td>{{$collector->name}}</td>
            <td>{{$collector->phone}}</td>
            <td>{{$collector->n_agrement}}</td>
            <td>{{$collector->delivry_date}}</td>
            <td>{{$collector->expiration_date}}</td>
            <td>
              <form action="{{url('milkcheck/collectors/'.$collector->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                  <a href="{{url('milkcheck/collectors/'.$collector->id.'/edit')}}" class="btn btn-outline-success" style="margin-right: 3px;"><i data-feather="edit"></i></a>
                  <button type="submit" onclick="return confirm('Vous voulez vraiment supprimer?')" class="btn btn-outline-danger" ><i data-feather="trash"></i></button>
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
