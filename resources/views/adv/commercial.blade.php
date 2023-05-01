@extends('layouts.dashboard-adv')
@section('content')
<div class="page-content">
<nav class="page-breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Commandes</li>
</ol>
</nav>
@include('flash-message')
<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow-1">

        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Nombre de visites  </h6>
                <div class="dropdown mb-2">
                </div>
              </div>
              <div class="row">
                <div class="col-3 col-md-6 col-xl-5">
                  <h3  style="color: #6FB53E;"class="mb-2">{{ $nbr_visit }}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">satisfaction prix </h6>
                  <div class="dropdown mb-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-3 col-md-6 col-xl-5">
                    <h3  style="color: #6FB53E;"class="mb-2">{{ number_format($satisfaction_price ,1) }} %</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Connaissance produit  </h6>
                  <div class="dropdown mb-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-3 col-md-6 col-xl-5">
                    <h3  style="color: #6FB53E;"class="mb-2">{{ number_format($cp ,1) }} %</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Les visites</h6>
                <p class="text-muted mb-3">Vous trouvez ici  toutes les visites.</p>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>C.P ?</th>
                                <th>Avis prix</th>
                                <th>Etat</th>
                                <th>Remarque</th>

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

