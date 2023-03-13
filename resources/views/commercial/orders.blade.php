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

    <p class="text-muted mb-3">Vous trouvez ici  tous les professionnels.</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nom complet</th>
            <th>Téléphone</th>
            <th>Wilaya</th>
            <th>Total</th>
            <th>Date</th>
           <th>Action</th>
          </tr>
        </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$order->professional->user->name}}</td>
            <td>{{$order->professional->phone}}</td>
            <td>{{$order->professional->wilaya}}</td>
            <td><b>{{number_format($order->total)}}</b> Da</td>
            <td>{{$order->created_at}}</td>
            <td>
              <form action="" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                    <a href="#" data-id="{{ $order->id }}" class="btn btn-primary shadow btn-xs sharp "><i class="mdi mdi-border-color"></i></a>
                    <a href="#" data-id="{{ $order->id }}" class="btn btn-primary shadow btn-xs sharp show-orderline"><i class="mdi mdi-eye"></i></a>
                    <button class="btn btn-danger shadow btn-xs sharp "onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="mdi mdi-delete "></i></button>
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
