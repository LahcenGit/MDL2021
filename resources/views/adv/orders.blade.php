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
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">La table des commandes</h6>
    <p class="text-muted mb-3">Vous trouvez ici  tous les commandes.</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>wilaya</th>
            <th>Téléphone</th>
            <th>Pack</th>
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

            <td>
              <form action="{{url('milkcheck/orders/'.$order->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                    <a href="{{url('adv/order-detail/'.$order->id)}}" class="btn  btn-secondary  show-order" style="margin-right: 3px;"><i class="mdi mdi-eye"></i></a>
                    <a href="{{url('adv/order-ticket/'.$order->id)}}" class="btn  btn-warning  show-order" style="margin-right: 3px;"><i class="mdi mdi-cloud-print-outline
                      "></i></a>
                    @if ($order->statut == 1)
                    <a href="{{url('adv/order-approuve/'.$order->id)}}" onclick=" return confirm('Voulez-vous valider la commande ?')" class="btn  btn-primary  show-order" style="margin-right: 3px;"><i class="mdi mdi-check"></i></a>
                    <a href="{{url('adv/order-cancel/'.$order->id)}}" onclick="return confirm('Voulez-vous annuler la commande ?')" class="btn  btn-danger  show-order" style="margin-right: 3px;"><i class="mdi mdi-close"></i></a>
                    @endif
                    @if ($order->statut == 2)
                    <a href="{{url('adv/order-cancel/'.$order->id)}}" onclick="return confirm('Voulez-vous annuler la commande ?')" class="btn  btn-danger  show-order" style="margin-right: 3px;"><i class="mdi mdi-close"></i></a>
                    @endif
                    @if ($order->statut == 3)
                    <a href="{{url('adv/order-approuve/'.$order->id)}}" onclick=" return confirm('Voulez-vous valider la commande ?')" class="btn  btn-primary  show-order" style="margin-right: 3px;"><i class="mdi mdi-check"></i></a>
                    @endif

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
<div id="modal-order">

</div>
@endsection

@push('modal-order-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(".show-order").click(function() {

  var id = $(this).data('id');

  $.ajax({
    url: '/show-order/' + id,
    type: "GET",
    success: function (res) {
      $('#modal-order').html(res);
      $("#exampleModal").modal('show');
    }
  });

});

</script>
@endpush
