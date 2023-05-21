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
        <li class="breadcrumb-item"><a href="#">ADV</a></li>
        <li class="breadcrumb-item active" aria-current="page">Commandes livrées</li>
    </ol>
</nav>
    @include('flash-message')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <h6 class="card-title">La table des commandes livrées</h6>
        <p class="text-muted mb-3">Vous trouvez ici  tous les commandes.</p>
        <div class="table-responsive">
        <table id="dataTableExample" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Commande</th>
                <th>Livreur</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$order->professionalOrder->code}} </td>
                    <td>{{$order->user->name}}</td>
                    @if ($order->status == 0 )
                    <td><span class="badge bg-warning">Non livré</span></td>
                    @elseif($order->status == 1)
                    <td><span class="badge bg-success">Livré</span></td>
                    @endif
                    <td>
                    <form action="{{url('adv/delivery-orders/'.$order->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <div class="d-flex">
                            <button  onclick="return confirm('Vous voulez vraiment supprimer?')" class="btn btn-outline-danger"><i data-feather="trash"></i></button>
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
