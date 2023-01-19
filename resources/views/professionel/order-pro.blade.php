@extends('layouts.front')

@section('content')

<style>
    .big-checkbox {width: 20px; height: 20px;}
    .product-title{
        margin-left: 5px;
        font-size: 15px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-5">
                        <div class="bread"><a href="#">Accueil</a> &rsaquo; Commande</div>
                        <div class="bigtitle">Lancez une commande</div>
                    </div>
                   
                </div>
                </div>
            </div>
        </div>
    </div>

    <form class="form-horizontal checkout" method="POST" action="{{ route('register') }}">
        @csrf

             @if (count($errors) > 0)
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="row">
            <div  class="col-md-6">
                <div id="title-bg">
                    <div class="title">Choisir vos produits</div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-8">
                         <input type="checkbox" class="form-check-input big-checkbox" value=""> <span class="product-title"><b> Mozzarella Zahra </b> 100% naturel</span>
                    </div>
                    <div class="col-sm-4">
                        <input type="number" class="form-control @error('last_name') is-invalid @enderror" id="prenom" name="last_name" placeholder="Qte. Kg" required>
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-8">
                         <input type="checkbox" class="form-check-input big-checkbox" value=""> <span class="product-title"><b> Feta Zahra </b> 100% naturel</span>
                    </div>
                    <div class="col-sm-4">
                        <input type="number" class="form-control @error('last_name') is-invalid @enderror" id="prenom" name="last_name" placeholder="Qte. Kg" required>
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-8">
                         <input type="checkbox" class="form-check-input big-checkbox" value=""> <span class="product-title"><b> Halloumi Zahra </b> 100% naturel</span>
                    </div>
                    <div class="col-sm-4">
                        <input type="number" class="form-control @error('last_name') is-invalid @enderror" id="prenom" name="last_name" placeholder="Qte. Kg" required>
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                </div>


                <div id="title-bg">
                    <div class="title">Option livraison</div>
                </div>
             
                <div class="form-group dob">
                    <div class="col-sm-12">
                        <select class="form-control @error('wilaya') is-invalid @enderror" name="wilaya" placeholder="Wilaya" required>
                            <option value="Alger">Alger</option>
                            <option value="Tlemcen">Tlemcen</option>
                            <option value="Ain Temouchent">Ain Temouchent</option>
                        </select>

                    </div>

                    <div class="col-sm-12 " style="margin-top:5px;">
                       <span><b> Remarque </b> : la livraison est prévu pour le lundi prochain <b>18/01/2023</b> </span>
                    </div>
                </div>

            </div>
            <div class="col-md-6" >

                <div id="title-bg">
                    <div class="title">Détails commande</div>
                </div>

                <div style="margin-bottom: 10px;">
                    <span >Cliquez sur Calculer le prix pour affichier <br> 
                    le détails de la commande</span>
                </div>

                <div class="ticket " style="display: none">
                   
                    <div class="table-responsive">
                        <table class="table table-bordered chart">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Qte</th>
                                    <th>P.U</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Mozarella Zahra</td>
                                    <td>100 Kg</td>
                                    <td>800 Da</td>
                                    <td><b>8000.00 Da</b> </td>
                                </tr>
                                <tr>
                                    <td>Feta Zahra</td>
                                    <td>50 Kg</td>
                                    <td>600 Da</td>
                                    <td><b>6000.00 Da</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-5 col-md-offset-7">
                        <div class="subtotal-wrap">
                           {{-- <div class="subtotal">
                                <p>Sub Total : $26.00</p>
                                <p>Vat 17% : $54.00</p>
                            </div>--}}
                            <div class="total">Total : <span class="bigprice">14000.00 Da</span></div>
                        </div>
                        <div class="clearfix"></div>
                        </div>
                    </div>

                </div>

                <button type="button"  id="price-calculator" class="btn btn-default btn-red" style="background: -moz-linear-gradient(top, #FFC257, #FF8B00);">Calculer les tarifs</button>
                <a href="{{asset('/success-order')}}"><button type="button" class="btn btn-default btn-red">Valider la commande</button></a>
            </div>

        </div>
    </form>
    <div class="spacer"></div>
</div>
@endsection

@push('order-pro-front')
<script>
    $("#price-calculator").click(function() {
        $('.ticket').show();
    });
</script>
@endpush
