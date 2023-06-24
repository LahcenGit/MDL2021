@extends('layouts.milkcheck')
@section('content')
<div class="page-content">
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Milkcheck</a></li>
        <li class="breadcrumb-item active" aria-current="page">Employés</li>
    </ol>
    <a href="{{ asset('/update-note') }}" type="button"  onclick="return confirm('Vous voulez vraiment reinitialiser les notations ?')" class="btn btn-primary mt-3 " >Reinitialiser les notations</a>
</nav>
@include('flash-message')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h6 class="card-title">Les employés</h6>
            <p class="text-muted mb-3">Vous trouvez ici  tous les employés.</p>
            <div class="table-responsive">
            <table id="dataTableExample" class="table">
                <thead>
                <tr>
                    <th>Nom complet</th>
                    <th>Poste</th>
                    <th>Date de naissance</th>
                    <th>N° de téléphone</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($workers as $worker)
                    <tr>
                        <td>{{$worker->name}}</td>
                        <td>{{$worker->post}}</td>
                        <td>{{$worker->date_birth}}</td>
                        <td>{{$worker->phone}}</td>
                        <td id="td-worker-{{$worker->id}}">{{$worker->calculateNote()}}</td>
                        <td>
                        <form action="#" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <div class="d-flex">
                                <a href="#" class="btn btn-outline-success add-note" data-id="{{ $worker->id }}" style="margin-right: 3px;"><i data-feather="plus"></i></a>
                            <a href="#" class="btn btn-outline-primary" style="margin-right: 3px;"><i data-feather="edit"></i></a>
                            <button type="submit" onclick="return confirm('Vous voulez vraiment supprimer?')" class="btn btn-outline-danger" style="margin-right: 3px;" ><i data-feather="trash"></i></button>
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
<div id="modal-note">
</div>
@endsection
@push('modal-note-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(".add-note").click(function() {

  var id = $(this).data('id');

  $.ajax({
    url: '/modal-add-note/' + id,
    type: "GET",
    success: function (res) {
      $('#modal-note').html(res);
      $("#modal-add-note").modal('show');
    }
  });

});

$("#modal-note").on('click','#save',function(e){
        e.preventDefault();
         var tachesNotes = [];
        $('.tache-input').each(function(index) {
            var tacheId = $(this).data('id');
            var noteValue = $('#note-' + tacheId).val();
            var tacheNote = {
                tacheId: tacheId,
                noteValue: noteValue
            };

            tachesNotes.push(tacheNote);
        });
        var worker = $('#worker').val();
        $.ajax({

          type:"POST",
          url: "/store-note",
          data:{
            "_token": "{{ csrf_token() }}",
            tachesNotes: JSON.stringify(tachesNotes),
            worker:worker,

           },

          success:function(response){
            $('#modal-add-note').modal('hide');
            showSwal('mixin');
            $("#td-worker-"+worker).html(response);

          }
});
});
</script>
@endpush
