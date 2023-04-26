@extends('layouts.dashboard-admin')
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
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Commandes professionnels</h6>
                <p class="text-muted mb-3">Vous trouvez ici  toutes les commandes.</p>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Commande</th>
                            <th>Nom complet</th>
                            <th>Téléphone</th>
                            <th>Wilaya</th>
                            <th>Total</th>
                            <th>Statut</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$order->code}}</td>
                            <td>{{$order->professional->user->name}}</td>
                            <td>{{$order->professional->phone}}</td>
                            <td>{{$order->professional->wilaya}}</td>
                            <td><b>{{number_format($order->total)}}</b> Da</td>
                            @if ($order->status == 1 )
                            <td><span class="badge bg-warning">En attente</span></td>
                            @elseif($orders->status == 2)
                            <td><span class="badge bg-primary">Validé</span></td>
                            @elseif($order->status == 3)
                            <td><span class="badge bg-success">Livré</span></td>
                            @else
                            <td><span class="badge bg-danger">Annulé</span></td>

                            @endif
                            <td>{{$order->created_at->format('d-m-Y  H:i')}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
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
                    <table id="dataTableExampletwo" class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Client</th>
                            <th>Etat</th>
                            <th>remarque</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($visits as $visit)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$visit->professional->user->name}}</td>
                                    <td>@if($visit->etat == 0) Accépté @else Réfusé @endif</td>
                                    <td>{{$visit->note}}</td>
                                    <td>{{$visit->created_at->format('d-m-Y  H:i')}}</td>
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

