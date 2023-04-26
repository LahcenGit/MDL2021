@extends('layouts.dashboard-commercial')

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Les visites</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">

    <h6 class="card-title">Les visites</h6>

    <p class="text-muted mb-3">Vous trouvez ici  toutes les visites.</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Client</th>
            <th>CP ?</th>
            <th>Avis prix</th>
            <th>Etat</th>
            <th>Remarque</th>
            <th>Action</th>
          </tr>
        </thead>
          <tbody>
            @foreach($visits as $visit)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$visit->professional->user->name}}</td>
            <td>@if($visit->cp == 1)Oui @else Non @endif</td>
            <td>@if($visit->price_feedback == 0)Meilleur prix @elseif($visit->price_feedback == 1) Bon prix @else Prix elevé @endif</td>
            @if ($visit->etat == 0 )
            <td><span class="badge bg-warning">Demande d'essai</span></td>
            @elseif($visit->etat == 1)
            <td><span class="badge bg-success">Passé commande</span></td>
            @elseif($visit->etat == 2)
            <td><span class="badge bg-primary">Problème signalé</span></td>
            @else
            <td><span class="badge bg-danger">Refusé</span></td>

            @endif
            <td>{{$visit->note}}</td>
            <td>
              <form action="" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                    <a href="{{ asset('commercial/visits/'.$visit->id.'/edit') }}" class=" btn-xs sharp mr-1 "><i data-feather="edit"></i></a>
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
