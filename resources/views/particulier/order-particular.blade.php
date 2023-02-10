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
                    <div class="col-md-12">
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; Commande</div>
                        <div class="bigtitle" style="color:#1847AD">Lancez une commande</div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <ul class="small-menu"><!--small-nav -->
            <li><a href="{{ asset('/app-particular') }}"  class="myshop">Mes commandes</a></li>
            <li><a href="{{ asset('/app-particular/profil') }}" class="myacc">Mon profil</a></li>
            <li><a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"  class="sign-out">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul><!--small-nav -->
        <div class="clearfix"></div>
        <div class="lines"></div>
    </div>

    <form class="form-horizontal checkout" method="POST" action="{{ url('/app-particular/checkout') }}">
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
        <div class="row ">
            <div id="title-bg">
                <div class="title">Choisir vos produits </div>
            </div>
            @if($error == null)
            <p>Vous devez passer une commande d'un montant minimum de <b>2000 da</b></p>
            @else
                <div class="alert alert-danger mt-3" style="margin-top: 20px" role="alert">
                    Vous devez passer une commande d'un montant minimum de <b>2000 da</b>
                </div>
            @endif
            <div class="spacer"></div>

            @foreach($products->split($products->count()/2) as $row)
                <div class="col-md-6 ">
                    @foreach ($row as $product)
                        <div class="form-group dob">
                            <div class="col-sm-9">
                                <input type="checkbox" class="form-check-input big-checkbox"  name="products[]" value="{{ $product->id }}" > <span class="product-title"><b> {{ $product->designation }}</b> {{$product->capacity}}</span>
                                    @error('product')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-sm-3 ">
                                <input type="number" class="form-control  @error('qte') is-invalid @enderror" name="qtes[]" min="0" placeholder="Qte." disabled  >
                                    @error('qte')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="row d-flex justify-content-center">
            <div id="title-bg">
            </div>

            <div style="margin-bottom: 10px;">
                <span >Cliquez-ici pour avoir tous les détails de votre commande. </span>
            </div>
            <div>
                 <button type="submit" class="btn btn-default btn-red">Détails commande</button></a>
            </div>

        </div>

    </form>
    <div class="spacer"></div>
</div>
@endsection

@push('order-pro-front')
<script>

    $(".big-checkbox").click(function() {
        var set_disabled =  $(this).is(':checked') ? false : true;
        var set_required=  $(this).is(':checked') ? true : false;
         $(this).parent().next().children('input').attr('disabled',set_disabled);
         $(this).parent().next().children('input').attr('required',set_required);
    });

</script>
@endpush
