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
                        <div class="bread"><a href="{{ asset('/') }}">Accueil</a> &rsaquo; Commande</div>
                        <div class="bigtitle">Commande envoyée</div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="alert alert-success" role="alert">
            <p>Nous sommes très heureux que vous ayez choisi les produits de la Maison du Lait.</p>
            <p class="mb-0">L'un de nos agents vous contactera dans les plus brefs délais pour confirmer votre commande. </p>
          </div>
    </div>

    <a href="{{ asset('/') }}" class="btn btn-default btn-red">Retour sur le site</button>


    <div class="spacer"></div>
</div>
@endsection


