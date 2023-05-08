@extends('layouts.milkcheck')


@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">rapport</li>
        </ol>
    </nav>


    @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
       Svp ! Corrigez les erreurs suivantes :
       <div class="mb-2"></div>
    <div class="error">
        <ul class="ml-2">
            @foreach ($errors->all() as $error)
                <li style="font-weight:100; ">- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    </div>
    @endif

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
            <div class="card">
                <div class="card-body print-section" id="printable">

                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <img src="{{asset('assets/images/logo-report.png')}}"> <br>
                            <p><b>Site Web :</b>  www.lamaisondulait.dz <br>
                                <b>  Tél :</b> 0560 09 90 33
                            </p>
                        </div>
                        <div>
                            <h3 >Fiche de soutien agricole </h3> <br>
                            <p> Nom : {{$breeder->name}} | Mois : {{$month}}</p><br>
                            <p>Date d'éxpiration d'agrement : <b>{{ $breeder->expiration_date }}</b></p>

                        </div>

                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">qte / L</th>
                                <th scope="col">PU</th>
                                <th scope="col">total</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$stat->sum_qte}}</td>
                                    <td>{{$pu}}</td>
                                    <td>{{number_format($total , 2)}} Da</td>
                                </tr>
                                <tr>
                                    <td colspan="1"><b>Total</b> </td>
                                    <td ></td>
                                    <td ></td>
                                    <td > <b style="font-size: 17px">{{ number_format($total, 2) }}  Da</b> </td>
                                </tr>
                        </tbody>
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
