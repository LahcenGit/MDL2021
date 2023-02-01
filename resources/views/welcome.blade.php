@extends('layouts.front')

@section('content')
<style>
    .blue .inner{
        background-color: #6fb53d !important;
    }
    .blue{
        background-color: #6fb53d !important;
    }

</style>
<div class="container">
    <ul class="small-menu"><!--small-nav -->
        <li>Créer votre compte maintenant ! </li>
        <li><a href="{{ url('/register-particular') }}" class="myacc">Particulier</a></li>
        <li><a href="{{ url('/register-professional') }}"  class="myshop">Professionnel</a></li>
    </ul><!--small-nav -->
    <div class="clearfix"></div>
    <div class="lines"></div>
    <div class="main-slide">
        <div id="sync1" class="owl-carousel">
            <div class="item">
                <div class="slide-desc">
                    <div class="inner">
                        <h1>Stylish Jacket, be your best deal</h1>
                        <p>
                            Nunc non fermentum nunc. Sed ut ante eget leo tempor consequat sit amet eu orci. Donec dignissim dolor eget..
                        </p>
                        <button class="btn btn-default btn-red btn-lg">Add to cart</button>
                    </div>
                    <div class="inner">
                        <div class="pro-pricetag big-deal">
                            <div class="inner">
                                    <span class="oldprice">$314</span>
                                    <span>$199</span>
                                    <span class="ondeal">Best Deal</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-type-1">
                    <img src="mdltheme/images/dummy-1500x700.png" alt="" class="img-responsive"/>
                </div>
            </div>
            <div class="item">
                <div class="slide-type-1">
                    <img src="mdltheme/images/dummy-1500x700.png" alt="" class="img-responsive"/>
                </div>
            </div>
            <div class="item">
                <div class="slide-type-1">
                    <img src="mdltheme/images/dummy-1500x700.png" alt="" class="img-responsive"/>
                </div>
            </div>
            <div class="item">
                <div class="slide-type-1">
                    <img src="mdltheme/images/dummy-1500x700.png" alt="" class="img-responsive"/>
                </div>
            </div>
            <div class="item">
                <div class="slide-type-1">
                    <img src="mdltheme/images/dummy-1500x700.png" alt="" class="img-responsive"/>
                </div>
            </div>
            <div class="item">
                <div class="slide-type-1">
                    <img src="mdltheme/images/dummy-1500x700.png" alt="" class="img-responsive"/>
                </div>
            </div>
        </div>
    </div>
    <div class="bar"></div>
    <div id="sync2" class="owl-carousel">
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Some title here</h3>
                <p>Description here here here</p>
            </div>
        </div>
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Some title here</h3>
                <p>Description here here here</p>
            </div>
        </div>
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Some title here</h3>
                <p>Description here here here</p>
            </div>
        </div>
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Some title here</h3>
                <p>Description here here here</p>
            </div>
        </div>
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Some title here</h3>
                <p>Description here here here</p>
            </div>
        </div>
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Some title here</h3>
                <p>Description here here here</p>
            </div>
        </div>
    </div>
</div>
<div class="f-widget featpro">
    <div class="container">
        <div id="title-widget-bg">
            <div class="title-widget">Nos produits</div>
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
                        <img src="{{ asset('/mdltheme/images/'.$product->images[0]->lien) }}" alt="" class="img-responsive"/>
                        <div class="pricetag blue"><div class="inner"><span>{{ $product->pu_ht }} Da</span></div></div>
                    </div>
                        <span class="smalltitle"><a href="{{ url('product/'.$product->slug) }}">{{ $product->designation }}</a></span>
                        <span class="smalldesc">100% naturelle</span>
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
                <div class="title">La maison du lait</div>
            </div>
            <p class="ct">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <p class="ct">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="" class="btn btn-default btn-red btn-sm">Read More</a>

            <div id="title-bg">
                <div class="title">Lastest Products</div>
            </div>
            <div class="row prdct"><!--Products-->
                <div class="col-md-4">
                    <div class="productwrap">
                        <div class="pr-img">
                            <img src="{{ asset('mdltheme/images/img9.png') }}" alt="" class="img-responsive"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="productwrap">
                        <div class="pr-img">
                            <img src="{{ asset('mdltheme/images/img11.png') }}" alt="" class="img-responsive"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="productwrap">
                        <div class="pr-img">
                            <img src="{{ asset('mdltheme/images/img10.png') }}" alt="" class="img-responsive"/>
                        </div>
                    </div>
                </div>
            </div><!--Products-->
            <div class="spacer"></div>
        </div><!--Main content-->
        <div class="col-md-3"><!--sidebar-->
            <div id="title-bg">
                <div class="title">Categories</div>
            </div>

            <div class="categorybox">
                <ul>
                    <li><a href="#">Zahra</a></li>
                    <li><a href="#">Noora</a></li>
                    <li><a href="#">Jnan</a></li>
                </ul>
            </div>

            <div class="ads">
            </div>

        </div><!--sidebar-->
    </div>
</div>

@endsection
