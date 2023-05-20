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
            <li class="breadcrumb-item active" aria-current="page">Productions</li>
        </ol>
    </nav>
    @include('flash-message')
   <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
             <h6 class="card-title">La table des productions</h6>
             <p class="text-muted mb-3">Vous trouvez ici  toutes les productions.</p>
                <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($productions as $production)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$production->created_at->format('Y-m-d')}}</td>
                        <td>
                        <form action="{{url('milkcheck/productions/'.$production->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <div class="d-flex">
                                <a href="{{ asset('milkcheck/productions/edit/'.$production->id) }}" class="btn btn-outline-warning" style="margin-right: 3px;"><i data-feather="edit"></i></a>
                                <a href="#" data-id="{{ $production->id }}" class="btn btn-outline-primary show-productionline" style="margin-right: 3px;"><i data-feather="eye"></i></a>
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
<div id="modal-productionline">
</div>
@endsection
@push('modal-productionline-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(".show-productionline").click(function() {
  var id = $(this).data('id');
  $.ajax({
    url: '/modal-production-line/' + id,
    type: "GET",
    success: function (res) {
      $('#modal-productionline').html(res);
      $("#modal-production-line").modal('show');
    }
  });

});

</script>
@endpush
