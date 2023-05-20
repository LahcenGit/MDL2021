@extends('layouts.dashboard-delivry')
@section('content')
<div class="page-content">
    <div class="row">
      <div class="col-lg-9 col-xl-9 stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline mb-2">
                <h6 class="card-title mb-0">Dernières commandes</h6><br>

             </div>

              <div class="table-responsive mt-3">
                <table id="dataTableExample" class="table">
                  <thead>
                    <tr>
                      <th class="pt-0">#</th>
                      <th>Commande</th>
                      <th>Montant</th>
                      <th>Statut</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $order->professionalOrder->code }}</td>
                      <td>{{ $order->professionalOrder->total }} Da</td>
                      @if($order->status == 0)
                      <td>Non livré</td>
                      @else
                      <td>Livré</td>
                      @endif
                      <a href="" target="_blank" style="margin-right: 3px;"><i data-feather="map-pin"></i></a>
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
