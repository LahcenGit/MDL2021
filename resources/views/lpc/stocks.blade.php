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
            <li class="breadcrumb-item active" aria-current="page">stocks LPC</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">La table des stocks LPC</h6>
                    <p class="text-muted mb-3">Vous trouvez ici  les stocks LPC.</p>
                    <div class="d-flex flex-row-reverse">
                    <a href="#" type="button" class="btn btn-primary mb-3 add-stock-init">Stock initial</a>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                        <tr>
                            <th>DATE</th>
                            <th>PDL 0%</th>
                            <th>PDL 26%</th>
                            <th>FILM</th>
                            <th>Type</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($stocks as $stock)
                                <tr>
                                    <td>{{$stock->created_at->format('Y-m-d H:i')}}</td>
                                    <td>{{$stock->PDL0}} Kg</td>
                                    <td>{{$stock->PDL26}} Kg</td>
                                    <td>{{$stock->film}} Kg</td>
                                    <td>@if($stock->type == 0) Initial @elseif($stock->type == 1)Entrée @else Sortie @endif</td>
                                    {{--
                                        <td>
                                        <form action="{{url('milkcheck/lpc/stocks/'.$stock->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <div class="d-flex">
                                            <a href="{{url('milkcheck/lpc/stock/'.$stock->id.'/edit')}}" class="btn btn-outline-success" style="margin-right: 3px;"><i data-feather="edit"></i></a>
                                            <button type="submit" onclick="return confirm('Vous voulez vraiment supprimer?')" class="btn btn-outline-danger" ><i data-feather="trash"></i></button>
                                            </div>
                                        </form>
                                        </td>
                                    --}}
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
<div id="modal-add-stock-init"></div>
@endsection
@push('add-stock-init')
<script>
$(".add-stock-init").click(function() {
$.ajax({
  url: '/modal-add-stock-init',
  type: "GET",
  success: function (res) {
    $('#modal-add-stock-init').html(res);
    $("#modal-add-stock-initial").modal('show');
  }
});
});
</script>
<script>
    // Event listener for form submission inside the modal with the ID 'modal-add-brand'
    $("#modal-add-stock-init").on('submit', '#formAddStockInitial', function(e){
        e.preventDefault();
        // Disable the submit button and show a loading indicator
        $('#submit-btn').prop('disabled', true);
        // Create a FormData object from the form
        var formData = new FormData(this);

        // Disable all input fields inside the modal with the ID 'modal-add-stock-initial'
        $('#modal-add-stock-initial input').prop('disabled', true);

        // Set a timeout of 2 seconds before making the AJAX request
        setTimeout(function() {
            // AJAX request configuration
            $.ajax({
                url: '/store-stock-initial',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // If the AJAX request is successful
                    if (response.success) {
                        console.log(response);

                        // Set up a handler for when the modal is hidden
                        $('#modal-add-stock-initial').on('hidden.bs.modal', function (e) {
                            // Show a success message using toastr
                            toastr.success('Success', 'Stock ajoutée avec succés!');

                            // Reload the page after a delay of 3 seconds
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        }).modal('hide');
                    }
                },
                complete: function () {
                    // Regardless of success or failure, hide the loading indicator and enable input fields and the submit button
                    $('#modal-add-stock-initial input').prop('disabled', false);
                    $('#submit-btn').prop('disabled', false);
                }
            });
        }, 2000); // Pause of 2 seconds before making the AJAX request
    });
    </script>
@endpush
