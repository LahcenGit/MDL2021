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
                    <h6 class="card-title mb-0">{{ $resultat->product->designation }} </h6>
                    <div class="dropdown mb-2">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3 col-md-6 col-xl-5">
                      <h3  style="color: #6FB53E;"class="mb-2">{{ $resultat->stock }} Kg</h3>
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
       <div class="col-lg-7 col-xl-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Les dix dernières commandes</h6>

            </div>
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th class="pt-0">#</th>

                    <th>Nom</th>
                    <th>wilaya</th>
                    <th>Téléphone</th>
                    <th>Pack</th>
                    <th>Total</th>
                    <th>Statut</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->wilaya}}</td>
                    <td>{{$order->phone}}</td>
                    <td><b> {{$order->pack}} </b></td>
                    <td> <b class="text-primary"> {{$order->total}} Da </b></td>

                    @if ($order->statut == 1 )
                    <td><span class="badge bg-warning">En cours</span></td>
                    @elseif($order->statut == 2)
                    <td><span class="badge bg-success">Terminé</span></td>
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
    </div> <!-- row -->

        </div>
@endsection
