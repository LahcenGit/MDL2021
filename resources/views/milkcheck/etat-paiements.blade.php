@extends('layouts.milkcheck')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Les Etats de paiements</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Les Etats de paiements</h6>
    <p class="text-muted mb-3">Les calculs ci-dessous sont pour le mois en cours uniquement</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Eleveur</th>
            <th>Qte/L</th>
            <th>Prix M.</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($breeders as $breeder)
          <tr>

            <td>{{$loop->iteration}}</td>
            <td>{{$breeder->name}}</td>
            <td><b>{{$breeder->getQteMonth()}} </b> L</td>
            <td>{{number_format($breeder->getPriceMonth(),2)}} Da</td>
            <td><b>{{number_format($breeder->getQteMonth() * $breeder->getPriceMonth(),2)}}</b>  Da</td>
            <td>
              <form action="{{url('milkcheck/breeders/'.$breeder->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                  <a href="{{url('milkcheck/paiements/etat/'.$breeder->id)}}" class="btn btn-danger shadow btn-xs sharp " style="margin-right: 3px;"><i class="mdi mdi-file-export"></i></a>
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