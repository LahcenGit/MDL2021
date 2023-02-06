@extends('layouts.front')
@section('content')
<style>
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
                    <div class="col-md-4">
                        <div class="bread"><a href="#">Accueil</a> &rsaquo; Détail article</div>
                        <div class="bigtitle">Détail article</div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9"><!--Main content-->
            <div id="title-bg">
                <div class="title">{{ $blog->title }} </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="dt-img">
                        <a class="fancybox" href="{{ asset('mdltheme/images/'.$blog->image_principale) }}" data-fancybox-group="gallery" title=""><img src="{{ asset('mdltheme/images/'.$blog->image_principale) }}" alt="" class="img-responsive" /></a>
                    </div>
                    <div class="thumb-img">
                        <a class="fancybox" href="{{ asset('mdltheme/images/'.$blog->image_principale) }}" data-fancybox-group="gallery" title=""><img src="{{ asset('mdltheme/images/'.$blog->image_principale) }}" alt="" class="img-responsive" /></a>
                    </div>
                    <div class="thumb-img">
                        <a class="fancybox" href="{{ asset('mdltheme/images/'.$blog->image_1) }}" data-fancybox-group="gallery" title=""><img src="{{ asset('mdltheme/images/'.$blog->image_1) }}" alt="" class="img-responsive"/></a>
                    </div>
                    <div class="thumb-img">
                        <a class="fancybox" href="{{ asset('mdltheme/images/'.$blog->image_1) }}" data-fancybox-group="gallery" title=""><img src="{{ asset('mdltheme/images/'.$blog->image_2) }}" alt="" class="img-responsive"/></a>
                    </div>
                </div>
            </div>
            <div class="tab-review">
                <ul id="myTab" class="nav nav-tabs shop-tab">
                    <li class="active"><a href="#desc" data-toggle="tab">Description</a></li>
                </ul>
                <div id="myTabContent" class="tab-content shop-tab-ct">
                    <div class="tab-pane fade active in" id="desc">
                        <p>
                        {{ $blog->date }}<br>
                        {{$blog->description}}
                        </p>
                    </div>
               </div>
            </div>
         <div class="spacer"></div>
        </div><!--Main content-->
        <div class="col-md-3"><!--sidebar-->
            <div id="title-bg">
                <div class="title">Nos produits</div>
            </div>
            <div class="best-seller">
                <ul>
                    @foreach ($products as $product )
                        <li class="clearfix">
                            <a href="{{ asset('product/'.$product->slug) }}"><img src="{{ asset('mdltheme/images/'.$product->images[0]->lien) }}" alt="" class="img-responsive mini" /></a>
                            <div class="mini-meta">
                                <a href="{{ asset('product/'.$product->slug) }}" class="smalltitle2 cut-text">{{ $product->designation }}</a>
                                <p class="smallprice2">Prix : {{ $product->pu_ht }} Da</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div><!--sidebar-->
    </div>
</div>


@endsection
