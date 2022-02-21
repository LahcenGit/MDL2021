@extends('layouts.milkcheck')


@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">rapport</li>
        </ol>
    </nav>




    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div class="d-flex align-items-center flex-wrap text-nowrap">
          <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0  printMe">
            <i class="btn-icon-prepend " data-feather="printer"></i>
            Imprimer
          </button>
        </div>
      </div>



    <div class="row mt-3">
        <div class="col-md-12 grid-margin">
            <div class="card" >
                <div class="card-body print-section"  id="printable">

                   
                    <h2>Let the table borders collapse</h2>

                    <table>
                      <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                      </tr>
                      <tr>
                        <td>Peter</td>
                        <td>Griffin</td>
                      </tr>
                      <tr>
                        <td>Lois</td>
                        <td>Griffin</td>
                      </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('report-detail-scripts')
    
<script>
$('.printMe').click(function(){
    $('#printable').printThis();
});
</script> 

@endpush