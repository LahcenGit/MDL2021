@extends('layouts.front')
@section('content')
<style>
    .detpricetag .inner{
        background-color: #6fb53d !important;
    }
    .detpricetag{
        background-color: #6fb53d !important;
    }
    .blue .inner{
        background-color: #6fb53d !important;
    }
    .blue{
        background-color: #6fb53d !important;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="bread"><a href="#">Home</a> &rsaquo; Product Detail</div>
                        <div class="bigtitle">Product Detail</div>
                    </div>
                    <div class="col-md-3 col-md-offset-5">
                        <button class="btn btn-default btn-red btn-lg">Purchase Theme</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9"><!--Main content-->
            <div id="title-bg">
                <div class="title">{{ $product->designation }} {{ $product->capacity }}</div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="dt-img">
                        <div class="detpricetag"><div class="inner">{{ number_format($product->pu_ht )}} Da</div></div>
                        <a class="fancybox" href="{{ asset('mdltheme/images/'.$product->images[0]->lien) }}" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="{{ asset('mdltheme/images/'.$product->images[0]->lien) }}" alt="" class="img-responsive" /></a>
                    </div>
                    @foreach ($product->images as $image )
                        <div class="thumb-img">
                            <a class="fancybox" href="{{ asset('mdltheme/images/'.$image->lien) }}" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="{{ asset('mdltheme/images/'.$image->lien) }}" alt="" class="img-responsive" /></a>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6 det-desc">
                    <div class="productdata">
                        <div class="infospan">Type d'emabllage <span>{{ $product->type_emb }}</span></div>
                        <div class="infospan">DLC <span>{{ $product->dlc }}</span></div>
                        <div class="average">
                        <form role="form">
                        <div class="form-group">
                            <div class="rate"><span class="lbl">Avis</span>
                            </div>
                            <div class="starwrap">
                                <div id="score"></div>
                                <img src="{{ asset('mdltheme/js/rate/images/star-on.png') }}" alt="1" title="regular">
                                <img src="{{ asset('mdltheme/js/rate/images/star-on.png') }}" alt="1" title="regular">
                                <img src="{{ asset('mdltheme/js/rate/images/star-on.png') }}" alt="1" title="regular">
                                <img src="{{ asset('mdltheme/js/rate/images/star-on.png') }}" alt="1" title="regular">
                                <img src="{{ asset('mdltheme/js/rate/images/star-off.png') }}" alt="4" title="regular">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        </form>
                        </div>
                        <div class="sharing">
                            <div class="share-bt">
                                <div class="addthis_toolbox addthis_default_style ">
                                    <a class="addthis_counter addthis_pill_style"></a>
                                </div>
                                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f0d0827271d1c3b"></script>
                                <div class="clearfix"></div>
                            </div>
                            <div class="avatock"><span>In stock</span></div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="tab-review">
                <ul id="myTab" class="nav nav-tabs shop-tab">
                    <li class="active"><a href="#desc" data-toggle="tab">Description</a></li>
                    <li class=""><a href="#rev" data-toggle="tab">Reviews (0)</a></li>
                </ul>
                <div id="myTabContent" class="tab-content shop-tab-ct">
                    <div class="tab-pane fade active in" id="desc">
                        <p>
                        Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="rev">
                        <p class="dash">
                        <span>Jhon Doe</span> (11/25/2012)<br/><br/>
                        Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse.
                        </p>
                        <h4>Write Review</h4>
                        <form role="form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" >
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="text" ></textarea>
                        </div>
                        <div class="form-group">
                            <div class="rate"><span>Rating:</span></div>
                            <div class="starwrap">
                                <div id="default"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <button type="submit" class="btn btn-default btn-red btn-sm">Submit</button>
                    </form>

                    </div>
                </div>
            </div>

            <div id="title-bg">
                <div class="title">Produits associés</div>
            </div>
            <div class="row prdct"><!--Products-->
                @foreach($related_products as $related_product)
                    <div class="col-md-4">
                        <div class="productwrap">
                            <div class="pr-img">
                                <div class="hot"></div>
                                <img src="{{ asset('mdltheme/images/'.$related_product->images[0]->lien) }}" alt="" class="img-responsive"/>
                                <div class="pricetag blue"><div class="inner"><span>{{ $product->pu_ht }} Da</span></div></div>
                            </div>
                            <span class="smalltitle"><a href="{{ url('product/'.$related_product->slug) }}">{{ $related_product->designation }}</a></span>

                        </div>
                    </div>
                @endforeach
            </div><!--Products-->
            <div class="spacer"></div>
        </div><!--Main content-->
        <div class="col-md-3"><!--sidebar-->
            <div id="title-bg">
                <div class="title">Categories</div>
            </div>

            <div class="categorybox">
                <ul>
                    <li><a href="category.html">Women Accessories</a></li>
                    <li><a href="category.html">Men Shoes</a></li>
                    <li><a href="category.html">Gift Specials</a></li>
                    <li><a href="category.html">Electronics</a>
                        <ul>
                            <li><a href="#">iPhone 4S</a></li>
                            <li><a href="#">Samsung Galaxy</a></li>
                            <li><a href="#">MacBook Pro 17"</a></li>
                        </ul>
                    </li>
                    <li><a href="category.html">On sale</a></li>
                    <li><a href="category.html">Summer Specials</a></li>
                    <li><a href="category.html">Electronics</a></li>
                    <li class="lastone"><a href="category.html">Unique Stuff</a></li>
                </ul>
            </div>

            <div class="ads">
            </div>



        </div><!--sidebar-->
    </div>
</div>

@endsection
