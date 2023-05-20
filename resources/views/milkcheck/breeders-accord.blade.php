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
            <li class="breadcrumb-item active" aria-current="page">agréments eleveurs</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">La table des agréments des eleveurs</h6>
    <p class="text-muted mb-3">Vous trouvez ici tous les agréments des eleveurs .</p>
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
            @foreach($breeders as $breeder)
          <tr>
            <td>{{$breeder->name}}</td>
              @if ($breeder->check() > 15 )
              <td><span class="badge bg-success">Valide</span></td>
              @endif
              @if ($breeder->check() <= 0 )
              <td><span class="badge bg-danger">Expiré</span></td>
              @endif
              @if ($breeder->check() < 15 &&  $breeder->check()>0)
              <td><span class="badge bg-warning">Reste {{$breeder->check()}} jours </span></td>
              @endif
            <td>{{$breeder->phone}}</td>
            <td>{{$breeder->n_agrement}}</td>
            <td>{{$breeder->delivry_date}}</td>
            <td>{{$breeder->expiration_date}}</td>

            <td>
              <form action="{{url('milkcheck/breeders/'.$breeder->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                  <a href="{{url('milkcheck/breeders/'.$breeder->id.'/edit')}}"  class="btn btn-outline-primary"><i data-feather="edit"></i></a>
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
