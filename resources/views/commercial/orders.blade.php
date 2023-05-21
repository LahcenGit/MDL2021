@extends('layouts.dashboard-commercial')

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

    <h6 class="card-title">La table des commandes</h6>

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
           <th>Action</th>
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
            @elseif($order->status == 2)
            <td><span class="badge bg-primary">Validé</span></td>
            @elseif($professional_order->status == 3)
            <td><span class="badge bg-success">Livraison...</span></td>
            @elseif($professional_order->status == 4)
            <td><span class="badge bg-success">Livré</span></td>
            @else
            <td><span class="badge bg-danger">Annulé</span></td>

            @endif
            <td>{{$order->created_at->format('d-m-Y  H:i')}}</td>
            <td>
              <form action="" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                    @if($order->status == 1)
                    <a href="{{ asset('commercial/order-professionals/edit/'.$order->id) }}" data-id="{{ $order->id }}" class=" btn-xs sharp "><i data-feather="edit"></i></a>
                    @endif
                    <a href="{{url('commercial/order-professional-detail/'.$order->id)}}" class="btn-xs sharp show-orderline"><i data-feather="eye"></i></a>
                    <a href="{{asset('redirect-position/'.$order->professional->latitude.'/'.$order->professional->longitude)}}" target="_blank" style="margin-right: 3px;"><i data-feather="map-pin"></i></a>
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
<div id="modal-orderline">
</div>
@endsection
@push('modal-orderline-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(".show-orderline").click(function() {

  var id = $(this).data('id');

  $.ajax({
    url: '/modal-order-line/' + id,
    type: "GET",
    success: function (res) {
      $('#modal-orderline').html(res);
      $("#modal-order-line").modal('show');
    }
  });

});

</script>
@endpush
