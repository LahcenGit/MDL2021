@extends('layouts.order')

<style>
.title-order{
    font-size: 20px;
}
.check-radio{
    padding: 15px;
}

div label input {
   margin-right:100px;
}
#ck-button {
    margin:4px;
    background-color:#EFEFEF;
    border-radius:4px;
    border:1px solid #D0D0D0;
    overflow:auto;
    float:left;
}

#ck-button:hover {
    background:red;
}

#ck-button label {
    float:left;
    width:4.0em;
}

#ck-button label span {
    text-align:center;
    padding:3px 0px;
    display:block;
}

#ck-button label input {
    position:absolute;
    top:-20px;
}

#ck-button input:checked + span {
    background-color:#911;
    color:#fff;
}


</style>


@section('content')


<div class="card">
<div class="card-body">
<h4 class="text-center mb-3 mt-4"> <span style="color: #6FB53E">Etape 1/3 : </span> Choisir votre pack</h4>
<p class="text-muted text-center mb-4 pb-2">Veuillez sélectionner un pack pour passer à l'étape suivante</p>
        <div class="container" style="margin-top: 50px;">  
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 stretch-card grid-margin grid-margin-md-0">
                <div class="card">
                    <div class="card-body">
                    <h5 class="text-center text-uppercase mt-3 mb-4">Pack "Ramadan"</h5>
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('assets/images/pack-03.png')}}" style="height: 200px; width:200px;">
                    </div>
                    <h3 class="text-center fw-light"><b style="color: #6FB53E;">2.500 Da</b></h3>
                    <h6 class="text-muted text-center mb-4 fw-normal">6 pièces</h6>
                    <table class="mx-auto">
                        <tr>
                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                        <td><p>2x500g Fromage au choix</p></td>
                        </tr>
                        <tr>
                            <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                            <td><p>1 Pot de Feta à l'huile au choix</p></td>
                        </tr>
                        <tr>
                            <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                            <td><p>Fromage de chèvre</p></td>
                        </tr>
                      
                        <tr>
                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                        <td><p>1 Boule Mozzarella</p></td>
                        </tr>
                        <tr>
                            <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                            <td><p>500g de Beurre</p></td>
                        </tr>
                       
                        <tr>
                        <tr>
                        </tr>
                    </table>
                    <div class="mt-3">

                    </div>
                    <div class="d-grid">
                        <a href="{{asset('orders/pack-four/')}}"  class="btn btn-primary mt-4">J'achète</a>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                <div class="card">
                    <div class="card-body">
                    <h5 class="text-center text-uppercase mt-3 mb-4">Pack "Tot Bag"</h5>
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('assets/images/pack-01.png')}}"  style="height: 200px; width:200px;"  >
                    </div>
                    <h3 class="text-center fw-light"><b style="color: #6FB53E;">2.000 Da</b></h3>
                    <h6 class="text-muted text-center mb-4 fw-normal">6 pièces</h6>
                    <table class="mx-auto">
                        <tr>
                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                        <td><p>2x500g Fromage au choix</p></td>
                        </tr>
                        <tr>
                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                        <td><p>3 x Boules Mozzarella</p></td>
                        </tr>
                        <tr>
                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                        <td><p>1 Tot bag</p></td>
                        </tr>
                        <tr>
                     
                        <tr>
                        </tr>
                    </table>
                    <div class="d-grid">
                        <a href="{{asset('orders/pack-one/')}}"  class="btn btn-primary mt-4">J'achète</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                <div class="card">
                    <div class="card-body">
                    <h5 class="text-center text-uppercase mt-3 mb-4">Pack "9ouffa"</h5>
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('assets/images/pack-02.png')}}" style="height: 200px; width:200px;">
                    </div>
                    <h3 class="text-center fw-light"><b style="color: #6FB53E;">2.000 Da</b></h3>
                    <h6 class="text-muted text-center mb-4 fw-normal">4 pièces</h6>
                    <table class="mx-auto">
                        <tr>
                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                        <td><p>2x500g Fromage au choix</p></td>
                        </tr>
                        <tr>
                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                        <td><p>1 Feta à huile d'olive</p></td>
                        </tr>
                        <tr>
                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                        <td><p>1 Couffin</p></td>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                    <div class="d-grid">
                        <a href="{{asset('orders/pack-two/')}}"  class="btn btn-primary mt-4">J'achète</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                <div class="card">
                    <div class="card-body">
                    <h5 class="text-center text-uppercase mt-3 mb-4">Pack "Zahra"</h5>
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('assets/images/pack-03.png')}}" style="height: 200px; width:200px;">
                    </div>
                    <h3 class="text-center fw-light"><b style="color: #6FB53E;">2.000 Da</b></h3>
                    <h6 class="text-muted text-center mb-4 fw-normal">4 pièces</h6>
                    <table class="mx-auto">
                        <tr>
                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                        <td><p>3x500g Fromage au choix</p></td>
                        </tr>
                      
                        <tr>
                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                        <td><p>1 Boule Mozzarella</p></td>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                    <div class="mt-3">

                    </div>
                    <div class="d-grid">
                        <a href="{{asset('orders/pack-three/')}}"  class="btn btn-primary mt-4">J'achète</a>
                    </div>
                    </div>
                </div>
            </div>
            

             

    </div>
    </div>

    </div>
    </div>
 
@endsection