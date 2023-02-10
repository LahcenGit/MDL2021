@extends('layouts.front')
@section('content')
<style>
     .blue .inner{
        background-color: #6fb53d !important;
    }
    .blue{
        background-color: #6fb53d !important;
    }

    .cut-text {
        text-overflow: ellipsis;
        overflow: hidden;
        width: 120px;
        white-space: nowrap;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; Produits</div>
                        <div class="bigtitle" style="color:#1847AD">Nos produits 100% naturels</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row prdct"><!--Products-->
        @foreach($products as $product)
            <div class="col-md-3">
                <div class="productwrap">
                    <div class="pr-img">
                        <div class="hot"></div>
                        <a href="{{ url('product/'.$product->slug) }}">
                            <img src="{{ asset('/mdltheme/images/'.$product->images[0]->lien) }}" alt="" class="img-responsive"/>
                        </a>
                        <div class="pricetag blue"><div class="inner"><span>{{ $product->pu_ht }} Da</span></div></div>
                    </div>
                        <span class="smalltitle cut-text " ><a href="{{ url('product/'.$product->slug) }}">{{ $product->designation }}</a></span>
                        <span class="smalldesc">{{ $product->capacity }}</span>
                </div>
            </div>
        @endforeach
    </div><!--Products-->
    <div class="spacer"></div>
</div>

@endsection
