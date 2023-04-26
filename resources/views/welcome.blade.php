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



/* Animation property */
.ads {
  animation: wiggle 2s linear infinite;
}

/* Keyframes */
@keyframes wiggle {
  0%, 7% {
    transform: rotateZ(0);
  }
  15% {
    transform: rotateZ(-15deg);
  }
  20% {
    transform: rotateZ(10deg);
  }
  25% {
    transform: rotateZ(-10deg);
  }
  30% {
    transform: rotateZ(6deg);
  }
  35% {
    transform: rotateZ(-4deg);
  }
  40%, 100% {
    transform: rotateZ(0);
  }
}


</style>
<div class="container">

    @auth
        <ul class="small-menu"><!--small-nav -->
            <li ><a href="javascript:void(0)" class="myacc">Bonjour, <span style="color: #6fb53d">{{ucfirst(Auth::user()->name) }}</span> </a> </li>
        </ul><!--small-nav -->
    @else
        <ul class="small-menu"><!--small-nav -->
            <li>Créer votre compte maintenant ! </li>
            <li><a href="{{ url('/register-particular') }}" class="myacc">Particulier</a></li>
            <li><a href="{{ url('/register-professional') }}"  class="mypro">Professionnel</a></li>
        </ul><!--small-nav -->
    @endauth

    <div class="clearfix"></div>
    <div class="lines"></div>
    <div class="main-slide">
        <div id="sync1" class="owl-carousel">
            <div class="item">
                
                <div class="slide-type-1">
                    <img src="{{asset('/slider/slider-ramadan.jpg')}}" alt="" class="img-responsive"/>
                </div>
            </div>
            <div class="item">
                <div class="slide-desc">
                    <div class="inner">
                        <h1>Fromages 100% naturels</h1>
                        <p>
                           Mozzarella, Feta, Halloumi à base de lait de vache
                        </p>
                    </div>
                    <div class="inner">
                        <div class="pro-pricetag big-deal">
                            <div class="inner">
                                    <span>500g</span>
                                    <span class="ondeal">Poids</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-type-1">
                    <img src="{{asset('/slider/slider-1.jpg')}}" alt="" class="img-responsive"/>
                </div>
            </div>
            <div class="item">
                <div class="slide-desc">
                    <div class="inner">
                        <h1 style="color: #fff;text-shadow: 1px 1px 1px rgb(3, 122, 23);">Découvrez la mozzarella Zahra</h1>
                        <p style="color: #fff">
                            délicieuse, laiteuse et savoureuse...
                        </p>
                        <a href="{{asset('/product/fromage-mozzarella-zahra-sous-vide')}}"><button class="btn btn-default btn-red btn-lg">Découvrir</button></a>
                    </div>

                </div>
                <div class="slide-type-1">
                    <img src="{{asset('/slider/slider-2.jpg')}}" alt="" class="img-responsive"/>
                </div>
            </div>
            <div class="item">
                <div class="slide-desc">
                    <div class="inner">
                        <p style="color: #fff">
                            Feta à l'huile d'olive aux herbes...
                        </p>
                        <a href="{{asset("/product/feta-cube-fines-herbes-et-huile-d'olive")}}"><button class="btn btn-default btn-red btn-lg">Découvrir</button></a>
                    </div>

                </div>
                <div class="slide-type-1">
                    <img src="{{asset('/slider/slider-3.jpg')}}" alt="" class="img-responsive"/>
                </div>
            </div>


        </div>
    </div>
    <div class="bar"></div>
    <div id="sync2" class="owl-carousel">
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Produits Ramdan</h3>
                <p>Ramadan Kareem </p>
            </div>
        </div>
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Fromages 500g</h3>
                <p>100% naturels</p>
            </div>
        </div>
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Mozarella</h3>
                <p>délicieuse, laiteuse</p>
            </div>
        </div>
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Feta fines herbes</h3>
                <p>avec huile d'olive</p>
            </div>
        </div>
    </div>
</div>
<div class="f-widget featpro">
    <div class="container">
        <div id="title-widget-bg">
            <div class="title-widget">Nos produits 100% naturels</div>
            <div class="carousel-nav">
                <a class="prev"></a>
                <a class="next"></a>
            </div>
        </div>
        <div id="product-carousel" class="owl-carousel owl-theme">
            @foreach ($products as $product )
            <div class="item">
                <div class="productwrap">
                    <div class="pr-img">
                        <div class="hot"></div>
                        <a href="{{ url('product/'.$product->slug) }}">
                            <img src="{{ asset('/mdltheme/images/'.$product->images[0]->lien) }}" alt="" class="img-responsive"/>
                        </a>
                        <div class="pricetag blue"><div class="inner"><span>{{ number_format($product->pu_ht )}} Da</span></div></div>
                    </div>
                        <span class="smalltitle cut-text " ><a href="{{ url('product/'.$product->slug) }}">{{ $product->designation }}</a></span>
                        <span class="smalldesc">{{ $product->capacity }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-9"><!--Main content-->
            <div id="title-bg">
                <div class="title">Une seule mission !</div>
            </div>
            <p class="ct" style="font-size:15px">
                Chez La Maison du Lait, nous croyons que manger sainement tout en se faisant plaisir n'est pas une contradiction, mais une mission.

                C'est pourquoi nous proposons des <b style="color: #6fb53d"> produits laitiers frais</b> pour chaque instant de la vie et pour le plus grand plaisir de tous.
            </p>



            <div id="title-bg">
                <div class="title">Plats de nos Clients !</div>
            </div>

            <div id="plat-carousel" class="owl-carousel owl-theme" style="background-color: #DBDFE3; padding:20px">
                <div class="item" style="margin-right: 10px">
                    <div class="productwrap">
                        <div class="pr-img">
                            <a href="{{ asset('mdltheme/images/img9.png') }}" class="fancybox">
                                <img class="img-responsive" src="{{ asset('mdltheme/images/img9.png') }}" alt="" />
                            </a>
                        </div>
                     </div>
                </div>
                <div class="item" style="margin-right: 10px">
                    <div class="productwrap">
                        <div class="pr-img">
                            <a href="{{ asset('mdltheme/images/img11.png') }}" class="fancybox">
                                <img class="img-responsive" src="{{ asset('mdltheme/images/img11.png') }}" alt="" />
                            </a>
                        </div>
                     </div>
                </div>

                <div class="item" style="margin-right: 10px">
                    <div class="productwrap">
                        <div class="pr-img">
                            <a href="{{ asset('mdltheme/images/img12.png') }}" class="fancybox">
                                <img class="img-responsive" src="{{ asset('mdltheme/images/img12.png') }}" alt="" />
                            </a>
                        </div>
                     </div>
                </div>
                <div class="item" style="margin-right: 10px">
                    <div class="productwrap">
                        <div class="pr-img">
                            <a href="{{ asset('mdltheme/images/img10.png') }}" class="fancybox">
                                <img class="img-responsive" src="{{ asset('mdltheme/images/img10.png') }}" alt="" />
                            </a>
                        </div>
                     </div>
                </div>
                <div class="item" style="margin-right: 10px">
                    <div class="productwrap">
                        <div class="pr-img">
                            <a href="{{ asset('mdltheme/images/img13.png') }}" class="fancybox">
                                <img class="img-responsive" src="{{ asset('mdltheme/images/img13.png') }}" alt="" />
                            </a>
                        </div>
                     </div>
                </div>

            </div>



        <div class="spacer"></div>
        </div><!--Main content-->
        <div class="col-md-3"><!--sidebar-->
            <div class="ads " >
                @if(Auth::user())
                    @if(Auth::user()->type == 'particulier')
                    <a href="{{asset('app-particular/order')}}"><img style="border-radius:10px" src="{{asset('/pack-02.jpg')}}" width="100%" height="100%" alt="" srcset=""></a>
                    @elseif(Auth::user()->type == 'professionnel')
                    <a href="{{asset('professionnel-pack-order')}}"><img style="border-radius:10px" src="{{asset('/pack-02.jpg')}}" width="100%" height="100%" alt="" srcset=""></a>
                    @endif
                @else
                <a href="{{asset('app-particular/order')}}"><img style="border-radius:10px" src="{{asset('/pack-02.jpg')}}" width="100%" height="100%" alt="" srcset=""></a>
                @endif
            </div>

        </div><!--sidebar-->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="title-bg">
                <div class="title">Actualités</div>
            </div>
            <div class="owl-carousel owl-theme" id="article-carousel"  style="background-color: #DBDFE3; padding:20px">
                @foreach($blogs as $blog)
                    <div class="item" style="margin-right: 5px">
                        <div class="productwrap">
                            <div class="pr-img">
                                <a href="{{ asset('blog/'.$blog->slug) }}">
                                <img src="{{ asset('mdltheme/images/'.$blog->image_principale) }}" alt="" class="img-responsive"/>
                                </a>
                            </div>
                            <span class="smalltitle"><a href="{{ asset('blog/'.$blog->slug) }}">{{ $blog->title }}</a></span>
                            <span class="smalldesc">{{ $blog->date }}</span>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <div class="spacer"></div>
</div>

@endsection
