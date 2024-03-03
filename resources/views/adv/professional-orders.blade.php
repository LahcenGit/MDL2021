@extends('layouts.dashboard-adv')
@section('content')
<style>
    .btn{
        padding: 0.4rem 0.4rem !important;
    }

</style>
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
            <td>{{$order->professional->user->name}} </td>
            <td>{{$order->professional->wilaya}}</td>
            <td>{{$order->professional->adresse}}</td>
            <td>{{$order->professional->phone}}</td>
            <td> <b class="text-primary"> {{number_format($order->total)}} Da </b></td>

            @if ($order->status == 1 )
            <td><span class="badge bg-warning">En attente</span></td>
            @elseif($order->status == 2)
            <td><span class="badge bg-primary">Validé</span></td>
            @elseif($order->status == 3)
            <td><span class="badge bg-info">livraison...</span></td>
            @elseif($order->status == 4)
            <td><span class="badge bg-success">livré</span></td>
            @else
            <td><span class="badge bg-danger">Annulé</span></td>

            @endif

            <td>{{$order->created_at->format('d-m-Y  H:i')}}</td>

            <td>
              <form action="{{url('adv/professional-orders/'.$order->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                    <a href="{{url('adv/order-professional-detail/'.$order->id)}}" class="btn btn-outline-success show-order" style="margin-right: 3px;"><i data-feather="eye"></i></a>
                    <a href="#" data-id="{{ $order->id }}" class="btn btn-outline-primary edit-status" style="margin-right: 3px;"><i data-feather="edit-2"></i></a>
                    <a href="{{url('adv/professional-orders/'.$order->id.'/edit')}}" class="btn btn-outline-warning"  style="margin-right: 3px;"><i data-feather="edit"></i></a>
                    @if($order->status != 3 && $order->status != 4)
                     <a href="#"  style="margin-right: 3px;" class="btn btn-outline-primary add-delivry" data-id="{{ $order->id }}"><i data-feather="truck"></i></a>
                    @endif
                    @if($order->professional->latitude)
                    <a href="{{asset('redirect-position/'.$order->professional->latitude.'/'.$order->professional->longitude)}}"class="btn btn-outline-secondary " target="_blank" style="margin-right: 3px;"><i data-feather="map-pin"></i></a>
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
<div id="modal-add-delivry">

</div>
<div id="modal-edit-status">

</div>
@endsection

@push('modal-delivry-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(".add-delivry").click(function() {

  var id = $(this).data('id');
  $.ajax({
    url: '/show-modal-delivry/' + id,
    type: "GET",
    success: function (res) {
      $('#modal-add-delivry').html(res);
      $("#showModalD").modal('show');
    }
  });

});
$("#modal-add-delivry").on('click','#submit',function(e){

   e.preventDefault();
   let delivry = $('#delivry').val();
   let order = $('#order').val();
   $.ajax({

     type:"POST",
     url: "/store-delivry-order",
     data:{
       "_token": "{{ csrf_token() }}",
       delivry:delivry,
       order:order,
      },

     success:function(response){

       $('#showModalD').modal('hide');

       console.log(response);
       location.reload();
     },

     });

});
</script>
@endpush

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
    url: '/show-professional-orderline/' + id,
    type: "GET",
    success: function (res) {
      $('#modal-orderline').html(res);
      $("#showModal").modal('show');
    }
  });

});

</script>
@endpush
@push('edit-status-script')

<script>
$(".edit-status").click(function() {

var id = $(this).data('id');

$.ajax({
  url: '/adv/edit-status/' + id,
  type: "GET",
  success: function (res) {
    $('#modal-edit-status').html(res);
    $("#modalStatusOrder").modal('show');
  }
});

});

$("#modal-edit-status").on('click','#save',function(e){

        e.preventDefault();
        let status = $('#status').val();
        let order = $('#order').val();
      $.ajax({

          type:"POST",
          url: "/adv/update-status",
          data:{
            "_token": "{{ csrf_token() }}",
            status:status,
            order:order,

           },

          success:function(response){
           $('#modalStatus').modal('hide');

            console.log(response);
            location.reload();
          }
});

   });

</script>
@endpush
