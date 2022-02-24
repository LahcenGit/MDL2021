@extends('layouts.dashboard-admin')

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail ommande</li>
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

     <b>Remarque :</b> 
      @if ($order->remarque == null)
      Aucune  !

      @else
      {{$order->remarque}}
      @endif 



    <div class="row mt-3">
        <div class="col-md-12 grid-margin">
            <div class="card" style="width: 500px; height:300px;"  id="printable" >
                <div class="card-body print-section" >

                    <div class="d-flex justify-content-between" >

                        <div >
                            <img src="{{asset('mdl-black.png')}}" height="104px" width="120px"> <br>
                        </div>
                        
                        <div class="infos-client" style="width: 250px;">
                            <p ><b> Client:</b> {{$order->name}}</p>
                            <p ><b> Tél.  </b> {{$order->phone}}</p>
                            <p ><b> Adresse: </b> {{$order->adress}}, {{ucfirst($order->wilaya)}}</p>
                            <hr style="border-top: 3px solid ">

                        </div>
                    </div>

                    <div class="order-detail mt-3">
                        <h4>Détail de la commande : </h4>
                        <div class="row mt-2">  
                            <div class="col-6">
                                <p>
                                    @foreach ($order->orderlines as $line)
                                        <b>{{$loop->iteration}}</b>-
                                        @if ( $line->product == "Mozzarella" || $line->product == "Feta" || $line->product =="Halloumi")
                                        {{$line->product}} 500 g
                                        @elseif($line->product == "Fines herbes" || $line->product == "Piment" || $line->product =="Cumin")
                                        Feta huile {{$line->product}} 340 g
                                        @elseif($line->product == "Fines herbes" || $line->product == "Piment" || $line->product =="Cumin")
                                        Feta huile {{$line->product}} 340 g
                                        @else
                                        {{$line->product}}
                                        @endif
                                        <br>
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-6 ml-4 mt-4">
                                <p>Total :</p> 
                                <b style="font-size: 25px">{{ number_format($order->total, 2) }}  Da</b> 
                            </div>

                        </div>
                 
                        
                        
                       
                    </div>
                  
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('order-detail-scripts')
    
<script>
$('.printMe').click(function(){
    $('#printable').printThis();
});
</script> 

@endpush