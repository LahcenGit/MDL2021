@extends('layouts.dashboard-admin')

@section('content')
<div class="page-content">
<nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Administration ventes</li>
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
                <h6 class="card-title mb-0">Revenu professionnel  </h6>
                <div class="dropdown mb-2">
                </div>
              </div>
              <div class="row">
                <div class="col-2 col-md-6 col-xl-5">
                  <h3  style="color: #6FB53E;"class="mb-2">{{ number_format($revenu_pro) }} Da</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Revenu glace  </h6>
                  <div class="dropdown mb-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-2 col-md-6 col-xl-5">
                    <h3  style="color: #6FB53E;"class="mb-2">{{ number_format($totalCategoryOrder) }} Da</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Revenu particulier </h6>
                  <div class="dropdown mb-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-2 col-md-6 col-xl-5">
                    <h3  style="color: #6FB53E;"class="mb-2">{{ number_format($revenu_particular ) }} Da</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Total commandes </h6>
                  <div class="dropdown mb-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-2 col-md-6 col-xl-5">
                    <h3  style="color: #6FB53E;"class="mb-2">{{ $nbr_order_pro }} </h3>
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
                            <th>Lancé par </th>
                            <th>Total</th>
                            <th>Statut</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($professional_orders as $professional_order)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$professional_order->code}}</td>
                            <td>{{$professional_order->professional->user->name}}</td>
                            <td>{{$professional_order->professional->phone}}</td>
                            <td>{{$professional_order->professional->wilaya}}</td>
                            @if($professional_order->commercial_id)
                            <td>Commercial</td>
                            @else
                            <td>ADV</td>
                            @endif
                            <td><b>{{number_format($professional_order->total)}}</b> Da</td>
                            @if ($professional_order->status == 1 )
                            <td><span class="badge bg-warning">En attente</span></td>
                            @elseif($professional_order->status == 2)
                            <td><span class="badge bg-primary">Validé</span></td>
                            @elseif($professional_order->status == 3)
                            <td><span class="badge bg-info">Livraison...</span></td>
                            @elseif($professional_order->status == 4)
                            <td><span class="badge bg-success">Livré</span></td>
                            @else
                            <td><span class="badge bg-danger">Annulé</span></td>

                            @endif
                            <td>{{$professional_order->created_at->format('d-m-Y  H:i')}}</td>
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
                <h6 class="card-title">Commandes particuliers</h6>
                <p class="text-muted mb-3">Vous trouvez ici  toutes les commandes.</p>
                <div class="table-responsive">
                    <table id="dataTableExampletwo" class="table">
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
                            @foreach($particulars_orders as $particular_order)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$particular_order->code}}</td>
                            <td>{{$particular_order->particular->user->name}}</td>
                            <td>{{$particular_order->particular->phone}}</td>
                            <td>{{$particular_order->particular->wilaya}}</td>
                            <td><b>{{number_format($particular_order->total)}}</b> Da</td>
                            @if ($particular_order->status == 1 )
                            <td><span class="badge bg-warning">En attente</span></td>
                            @elseif($particular_order->status == 2)
                            <td><span class="badge bg-primary">Validé</span></td>
                            @elseif($particular_order->status == 3)
                            <td><span class="badge bg-success">Livré</span></td>
                            @else
                            <td><span class="badge bg-danger">Annulé</span></td>

                            @endif
                            <td>{{$particular_order->created_at->format('d-m-Y  H:i')}}</td>
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
              <h6 class="card-title">Les commandes de Ramadan</h6>
              <p class="text-muted mb-3">Vous trouvez ici  toutes les commandes de pack ramadan.</p>
              <div class="table-responsive">
              <table id="dataTableExample" class="table">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>Nom</th>
                      <th>wilaya</th>
                      <th>Adresse</th>
                      <th>Téléphone</th>
                      <th>Total</th>
                      <th>Statut</th>
                      <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($ramdan_orders as $order)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$order->name}} </td>
                              <td>{{$order->wilaya}}</td>
                              <td>{{$order->address}}</td>
                              <td>{{$order->phone}}</td>
                              <td> <b class="text-primary"> {{number_format($order->total)}} Da </b></td>

                              @if ($order->status == 1 )
                              <td><span class="badge bg-warning">En attente</span></td>
                              @elseif($order->status == 2)
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

</div>

@endsection

