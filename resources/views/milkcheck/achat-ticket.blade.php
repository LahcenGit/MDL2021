@extends('layouts.milkcheck')
@section('content')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail achat</li>
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
            <div class="card" style="width: 450px; height:auto;"  id="printable" >
                <div class="card-body print-section" >

                    <div class="d-flex justify-content-center">

                        <div >
                            <img src="{{asset('mdl-black.png')}}" > <br>
                        </div>
                        
                    </div>

                   
                    <div class="text-center">  
                        <span style=" font-size: 22px !important;">Collecteur : <b>{{$achat->collector->name}}</b>  <br>
                        Date : <b> {{$date}}</b></span>

                        <table class="table">
                            <thead>
                              <tr>
                                <th  style=" font-size: 20px !important;">#</th>
                                <th  style=" font-size: 20px !important;">Eleveur</th>
                                <th  style=" font-size: 20px !important;">Qte</th>
                                <th  style=" font-size: 20px !important;">P.U</th>
                                <th  style=" font-size: 20px !important;">Total</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($achat->lineachats as $line)
                                <tr>
                                    <th scope="row" style=" font-size: 20px !important;">{{$loop->iteration}}</th>
                                    <td style=" font-size: 20px !important;">{{$line->breeder->name}}</td>
                                    <td style=" font-size: 20px !important;">{{$line->qte}}</td>
                                    <td style=" font-size: 20px !important;">{{$line->price}}</td>
                                    <td style=" font-size: 20px !important;">{{$line->total}}</td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    
                    <div class="mt-3 ">
                        <span> <b  style=" font-size: 22px !important;">Qte : {{$achat->qte . ' L'}}</b> </span> <br>
                        <span> <b  style=" font-size: 22px !important;">Total : {{number_format($achat->total, 2) . ' Da'}}</b> </span>
                    </div>
                    <div class="mt-3 d-flex justify-content-center mt-4">
                       <b class="d-flex justify-content-center" style=" font-size: 22px !important;">Merci pour votre service !</b>
                    </div>
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('achat-ticket-scripts')
    
<script>
$('.printMe').click(function(){
    $('#printable').printThis();
});
</script> 

@endpush