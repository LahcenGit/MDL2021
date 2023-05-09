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
            <li class="breadcrumb-item active" aria-current="page">agréments collecteurs</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">La table des agréments des collecteurs</h6>
    <p class="text-muted mb-3">Vous trouvez ici tous les agréments des collecteurs .</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Validation</th>
            <th>Telephone</th>
            <th>N°d'agrement</th>
            <th>Date d'expedition</th>
            <th>Date d'expiration</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($collectors as $collector)
          <tr>
            <td>{{$collector->name}}</td>
              @if ($collector->check() > 15 )
              <td><span class="badge bg-success">Valide</span></td>
              @endif
              @if ($collector->check() <= 0 )
              <td><span class="badge bg-danger">Expiré</span></td>
              @endif
              @if ($collector->check() < 15 &&  $collector->check()>0)
              <td><span class="badge bg-warning">Reste {{$collector->check()}} jours </span></td>
              @endif
            <td>{{$collector->phone}}</td>
            <td>{{$collector->n_agrement}}</td>
            <td>{{$collector->delivry_date}}</td>
            <td>{{$collector->expiration_date}}</td>

            <td>
              <form action="{{url('milkcheck/collectors/'.$collector->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                  <a href="{{url('milkcheck/collectors/'.$collector->id.'/edit')}}" class="btn btn-outline-primary"><i data-feather="edit"></i></a>
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
