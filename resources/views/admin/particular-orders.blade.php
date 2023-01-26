@extends('layouts.dashboard-admin')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Commandes Particuliers</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">La table des commandes des particuliers</h6>
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
            <td>{{$order->name}} </td>
            <td>{{$order->wilaya}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->phone}}</td>
            <td> <b class="text-primary"> {{number_format($order->total)}} Da </b></td>

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
              <form action="{{url('admin/particular-orders/'.$order->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                    <a href="#" class="btn  btn-secondary show-orderline" data-id="{{ $order->id }}" style="margin-right: 3px;"><i class="mdi mdi-eye"></i></a>
                    <a href="{{url('dashboard-admin/particular-orders/'.$order->id.'/edit')}}" class="btn  btn-warning  show-order" style="margin-right: 3px;"><i class="mdi mdi-border-color
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
    url: '/show-particular-orderline/' + id,
    type: "GET",
    success: function (res) {
      $('#modal-orderline').html(res);
      $("#showModalParticular").modal('show');
    }
  });

});

</script>
@endpush
