@extends('layouts.dashboard-admin')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Commandes Professionnels</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">La table des commandes des professionnels</h6>
    <p class="text-muted mb-3">Vous trouvez ici  tous les commandes.</p>
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
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$order->professional->user->first_name}} {{ $order->professional->user->last_name }}</td>
            <td>{{$order->professional->wilaya}}</td>
            <td>{{$order->professional->adresse}}</td>
            <td>{{$order->professional->phone}}</td>
            <td> <b class="text-primary"> {{$order->total}} Da </b></td>

            @if ($order->status == 1 )
            <td><span class="badge bg-warning">En attente</span></td>
            @elseif($order->status == 2)
            <td><span class="badge bg-primary">En production</span></td>
            @elseif($order->status == 3)
            <td><span class="badge bg-success">Validé</span></td>
            @else
            <td><span class="badge bg-danger">Annulé</span></td>

            @endif

            <td>{{$order->created_at->format('d-m-Y  H:i')}}</td>

            <td>
              <form action="{{url('admin/professional-orders/'.$order->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                    <a href="{{url('admin/order-detail/'.$order->id)}}" class="btn  btn-secondary  show-order" style="margin-right: 3px;"><i class="mdi mdi-eye"></i></a>
                    <a href="{{url('admin/professional-orders/'.$order->id.'/edit')}}" class="btn  btn-warning  show-order" style="margin-right: 3px;"><i class="mdi mdi-border-color
                      "></i></a>

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
