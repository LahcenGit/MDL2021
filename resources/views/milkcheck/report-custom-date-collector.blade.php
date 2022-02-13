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
                            <h3 >Rapport Collecteur</h3> <br>
                            <p> Nom : <b>{{$collector->name}}</b>  | Date : du <b>{{$datedebut}}</b>  au <b>{{$datefin}}</b>  </p><br>
                            <p style="margin-top: -20px"> Qte : <b>{{$qteglobal}}</b> L | Prix moyen : <b>{{$pricemoy}}</b>  Da</p>
                        </div>
                        
                    </div>
                  
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Eleveur</th>
                                <th scope="col">qte / L</th>
                                <th scope="col">prix</th>
                                <th scope="col">total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $global =0 ;
                            $qtetotal = 0;
                             @endphp
                            @foreach ($lineachats as $lineachat)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$lineachat->breeder->name}}</td> 
                                    <td>{{$lineachat->qte}}</td>
                                    <td>{{$lineachat->price}}</td>
                                    <td>{{$lineachat->qte * $lineachat->price}}</td>
                                </tr>

                                @php
                                $global = $global + ($lineachat->qte * $lineachat->price) ;
                                $qtetotal = $qtetotal + $lineachat->qte;
                            @endphp
                            @endforeach

                            <tr>
                                <td colspan="2"><b>Total</b> </td>
                                <td ><b>{{ $qtetotal}}</b> L</td>
                                <td ></td>
                                <td > <b style="font-size: 17px">{{ number_format($global, 2) }}  Da</b> </td>
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