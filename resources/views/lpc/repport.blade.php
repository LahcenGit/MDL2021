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
                        <img src="{{asset('assets/images/logo-report.png')}}">
                        <div>
                            <h3 >FICHE DE STOCK QUANTITATIF</h3>
                            <p>Période du <b>01/11/2023</b> Au <b>06/11/2023</b></p><br>
                            <p> <b>Code Article:</b>  MAT0001</p>
                            <p> <b>Référence : </b> 0%</p>
                            <p> <b>Désignation : </b> Poudre De Lait 0%</p>
                            <p><b> Unité :</b>KG</p>
                        </div>
                        </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Nature opération</th>
                                <th scope="col">St Init</th>
                                <th scope="col">Entrée</th>
                                <th scope="col">Sortie</th>
                                <th scope="col">St Finale</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>01/11/2023</td>
                                <td>Stock début période</td>
                                <td>2575</td>
                                <td>0</td>
                                <td>0</td>
                                <td>2575</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>02/11/2023</td>
                                <td>PROD NO PRODC2133</td>
                                <td>2575</td>
                                <td>0</td>
                                <td>525</td>
                                <td>2000</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>03/11/2023</td>
                                <td>PROD NO PRODC2598</td>
                                <td>2000</td>
                                <td>0</td>
                                <td>525</td>
                                <td>1525</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>04/11/2023</td>
                                <td>PROD NO PRODC2608</td>
                                <td>1525</td>
                                <td>0</td>
                                <td>525</td>
                                <td>1000</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>05/11/2023</td>
                                <td>PROD NO PRODC2756</td>
                                <td>1000</td>
                                <td>0</td>
                                <td>525</td>
                                <td>475</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>06/11/2023</td>
                                <td>PROD NO PRODC2865</td>
                                <td>475</td>
                                <td>0</td>
                                <td>475</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td colspan="3"><b>Total</b> </td>
                                <td><b>2575</b></td>
                                <td>0</td>
                                <td>1500</td>
                                <td><b>7575</b></td>
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
