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
    <div class="spacer"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; professionnel</div>
                        <div class="bigtitle" style="color:#be3935" style="margin-bottom: 10px;">Vous ne pouvez pas commander un pack !</div>
                        <p>
                            Nous sommes désolés de vous informer que les packs personnalisés ne sont disponibles que pour les clients particuliers et ne peuvent pas être commandés par les professionnels. nous vous invitons à consulter la page de la commande professionnelle par ici : <br>
                        </p>
                              <a href="{{asset('/app-professional/order-professional')}}"><button type="submit" class="btn btn-default btn-red" style="margin-bottom: 10px;margin-top: 10px;">Lancer une commande professionnelle</button></a>  <br>
                        <p>
                            Toutefois, si vous souhaitez commander un pack personnalisé, vous pouvez créer un compte en tant que particulier et passer votre commande. 
                        </p>
                     
                    </div>
                   
                </div>
                </div>
            </div>
        </div>
    </div>



    <div class="spacer"></div>
    <div class="spacer"></div>
</div>
@endsection


