@extends('layouts.milkcheck')
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
            <li class="breadcrumb-item active" aria-current="page">Achats</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">La table des achats</h6>
    <p class="text-muted mb-3">Vous trouvez ici  tous les achats.</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Colecteur</th>
            <th>destination</th>
            <th>Qte</th>
            <th>Prix</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($achats as $achat)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$achat->collector->name}}</td>
            <td>{{$achat->destination}}</td>
            <td><b> {{$achat->qte}} L </b></td>
            <td> <b class="text-primary"> {{$achat->price}} Da </b></td>
            <td>{{$achat->created_at}}</td>

            <td>
              <form action="{{url('milkcheck/achats/'.$achat->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                    <a href="{{url('milkcheck/achats/'.$achat->id.'/edit')}}" class="btn btn-outline-success" style="margin-right: 3px;"><i data-feather="edit"></i></a>
                    <a href="#" data-id="{{$achat->id}}"  class="btn btn-outline-primary show-achat" style="margin-right: 3px;"><i data-feather="eye"></i></a>
                    <a href="{{url('milkcheck/achat-ticket/'.$achat->id)}}"  data-id="{{$achat->id}}"class="btn btn-outline-warning" style="margin-right: 3px;" ><i data-feather="printer"></i></a>
                    <button  onclick="return confirm('Vous voulez vraiment supprimer?')"class="btn btn-outline-danger" style="margin-right: 3px;"><i data-feather="trash"></i></button>
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
<div id="modal-achat">

</div>
@endsection

@push('modal-achat-scripts')
<script>



  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(".show-achat").click(function() {

  var id = $(this).data('id');

  $.ajax({
    url: '/show-achat/' + id,
    type: "GET",
    success: function (res) {
      $('#modal-achat').html(res);
      $("#exampleModal").modal('show');
    }
  });

});


$(".ticket").click(function() {

  var id = $(this).data('id');

  $.ajax({
    url: '/ticket/' + id,
    type: "GET",
    success: function (res) {
     alert('success ! ticket imprimé ');
    }
  });

});

</script>
@endpush
