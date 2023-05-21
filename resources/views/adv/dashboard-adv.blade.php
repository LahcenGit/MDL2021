@extends('layouts.dashboard-adv')

@section('content')

<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Bienvenue</h4>
      </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
          <div class="row flex-grow-1">
            @foreach($resultats as $resultat)
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">{{ $resultat->product->soft_name }} {{ $resultat->product->capacity }} </h6>
                    <div class="dropdown mb-2">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3 col-md-6 col-xl-5">
                      <h3  style="color: #6FB53E;"class="mb-2">{{ $resultat->stock }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
    </div>

     <div class="row">
       <div class="col-lg-7 col-xl-6 stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Dernières commandes professionnels</h6>

            </div>
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th class="pt-0">#</th>
                    <th>Client</th>
                    <th>Téléphone</th>
                    <th>Total</th>
                    <th>Statut</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders_professional as $order_professional)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$order_professional->professional->user->name}} </td>
                   <td>{{$order_professional->professional->phone}}</td>
                    <td> <b class="text-primary"> {{number_format($order_professional->total)}} Da </b></td>

                    @if ($order_professional->status == 1 )
                    <td><span class="badge bg-warning">En attente</span></td>
                    @elseif($order_professional->status == 2)
                    <td><span class="badge bg-primary">Validé</span></td>
                    @elseif($order_professional->status == 3)
                    <td><span class="badge bg-info">Livraison...</span></td>
                    @elseif($order_professional->status == 4)
                    <td><span class="badge bg-success">Livré</span></td>
                    @else
                    <td><span class="badge bg-danger">Annulé</span></td>

                    @endif

                    <td>{{$order_professional->created_at->format('d-m-Y  H:i')}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7 col-xl-6 stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Dernières commandes particuliers</h6>

            </div>
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th class="pt-0">#</th>
                    <th>Nom</th>
                    <th>wilaya</th>
                    <th>Téléphone</th>
                    <th>Total</th>
                    <th>Statut</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders_particular as $order_particular)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$order_particular->name}} </td>
                    <td>{{$order_particular->wilaya}}</td>

                    <td>{{$order_particular->phone}}</td>
                    <td> <b class="text-primary"> {{number_format($order_particular->total)}} Da </b></td>

                    @if ($order_particular->status == 1 )
                    <td><span class="badge bg-warning">En attente</span></td>
                    @elseif($order_particular->status == 2)
                    <td><span class="badge bg-primary">Validé</span></td>
                    @elseif($order_particular->status == 3)
                    <td><span class="badge bg-success">Livré</span></td>
                    @else
                    <td><span class="badge bg-danger">Annulé</span></td>
                    @endif
                    <td>{{$order_particular->created_at->format('d-m-Y  H:i')}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- row -->

    </div>
@endsection
