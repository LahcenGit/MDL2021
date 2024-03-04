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
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; Commande</div>
                        <div class="bigtitle" style="color:#74BE40">Commande envoyée avec succès</div>
                        <p>Félicitations, votre commande a été passée avec succès ! Un représentant de notre service clientèle vous contactera bientôt <br> pour confirmer les détails de votre commande</p>
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


