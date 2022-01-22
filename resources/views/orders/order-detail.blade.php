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



    <div class="row mt-3">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body print-section" id="printable">

                    <div class="d-flex justify-content-between" >

                        <div >
                            <img src="{{asset('assets/images/logo-report.png')}}"> <br>
                            <p> <b>Site Web :</b>  www.lamaisondulait.dz <br>
                                  <b>  Tél :</b> 0560 09 90 33
                                </p>

                        </div>
                        
                        <div class="infos-client" style="width: 250px;">
                            <h3 >Bon de livraison </h3> <br>
                            <p ><b> Nom :</b> {{$order->name}}<br>
                            <b> Tél: </b> {{$order->phone}}  <br>
                            <b> Adresse:</b> {{$order->adress}} <br>
                             <b> Wilaya:</b>  {{ucfirst($order->wilaya)}}<br>

                            Date: {{$order->created_at->format('Y-m-d')}} </p><br>
                        </div>
                            
                    </div>
                  
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produit</th>
                                <th scope="col">Qte</th>
                            </tr>
                        </thead>

                        <tbody>
                         
                            @foreach ($order->orderlines as $line)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    @if ( $line->product == "Mozzarella" || $line->product == "Feta" || $line->product =="Halloumi")
                                    <td>{{$line->product}} 500 g</td>
                                    @elseif($line->product == "Fines herbes" || $line->product == "Piment" || $line->product =="Cumin")
                                    <td>Feta huile {{$line->product}} 340 g</td>
                                    @elseif($line->product == "Fines herbes" || $line->product == "Piment" || $line->product =="Cumin")
                                    <td>Feta huile {{$line->product}} 340 g</td>
                                    @else
                                    <td>{{$line->product}}</td>
                                    @endif

                                    <td>1</td>
                                    
                                </tr>
                            @endforeach

                            <tr >
                                <td colspan="2" style="text-align:right;"><b>Total</b> </td>

                                @if ( $order->wilaya == "alger" )
                                <td > <b >{{ number_format($order->total - 200, 2) }}  Da</b> </td>
                                @else
                                <td > <b >{{ number_format($order->total, 2) }}  Da</b> </td>
                                @endif
                                
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:right;"><b>Livraison</b> </td>
                                @if ( $order->wilaya == "alger" )
                                <td >  200 Da</td>
                                @else
                                <td >  0 Da</td>
                                @endif
                                
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:right;"><b>Total</b> </td>
                                <td > <b style="font-size: 17px">{{ number_format($order->total, 2) }}  Da</b> </td>
                            </tr>
                        </tbody>

                      
                    </table>
                      <div style="margin-top:250px;">
                        <h5>Merci d'avoir choisi la Maison du Lait ! </h5>
                        <h4>Naturellement Bon ! </h4>

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