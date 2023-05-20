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
                            <h2> Facture N°: ...</h2> <br>
                             MR. : <b>{{$breeder->name}}</b>  | {{$month}} {{ $year }}<br>
                            @if($breeder->agrement_type == 'IS')I.S. @elseif($breeder->agrement_type == 'A') A.S. @endif : <b>{{$breeder->n_agrement}}</b> | Date d'éxpiration : <b>{{ $breeder->expiration_date }}</b> <br>
                        </div>
                    </div>

                    <h5 class="text-center"> Doit : SARL la maison du lait - Remchi </h5> <br>

                    <table class="table table-striped mb-4">
                        <thead>
                            <tr >
                                <th scope="col">Designation</th>
                                <th scope="col">Qte</th>
                                <th scope="col">P.U</th>
                                <th scope="col">total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="height: 150px;">

                                <td>Laivraison du lait de vache Wilaya de Tlemcen - <B>{{$month}} {{ $year }}</B></td>
                                <td>{{$qteglobal}} L</td>
                                <td>{{$pricemoy}} Da</td>
                                <td>{{$pricemoy * $qteglobal}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: right;"><b>Montant H.T</b> </td>
                                <td > {{ number_format($pricemoy * $qteglobal, 2) }} </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: right;"><b>TVA 19%</b> </td>
                                <td > 0.00 </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: right;"><b>Frais d'analyse</b> </td>
                                <td > 300 </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: right;"><b>Total</b> </td>
                                <td > <b style="font-size: 17px">{{ number_format($pricemoy * $qteglobal  -300 , 2)}}  Da</b> </td>
                            </tr>
                        </tbody>
                    </table>

                    <p> Arrété la présente facture à la somme de : </p>
                    <h4> {{$total_part1}} dinars et {{$total_part2}} cts</h4>
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
