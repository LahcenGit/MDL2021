@extends('layouts.dashboard-commercial')
@section('content')
<div class="page-content">
    <div class="row">
      <div class="col-lg-7 col-xl-12 stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline mb-2">
                <h6 class="card-title mb-0">Les dix dernières commandes</h6><br>

             </div>
             <p class="mt-3"><b>{{ $order_en_attente }} </b>En attente(s) , <b>{{ $order_valide }} </b>Validé(s) , <b>{{ $order_annuler }} </b>Annulé(s)</p>
              <div class="table-responsive mt-3">
                <table class="table ">
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
                    @foreach($orders as $order)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$order->professional->user->name}}</td>
                      <td>{{$order->professional->phone}}</td>
                      <td> <b class="text-primary"> {{$order->total}} Da </b></td>
                      @if ($order->status == 1 )
                      <td><span class="badge bg-warning">En attente</span></td>
                      @elseif($order->status == 2)
                      <td><span class="badge bg-success">Validé</span></td>
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
