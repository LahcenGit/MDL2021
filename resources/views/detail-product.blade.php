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
                    <div class="col-md-9">
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; Produit</div>
                        <div class="bigtitle" style="color:#1847AD">{{ $product->designation }}</div>
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
                        <a class="fancybox" href="{{ asset('mdltheme/images/'.$product->images[0]->lien) }}" data-fancybox-group="gallery" title="Fromage 100% naturel "><img src="{{ asset('mdltheme/images/'.$product->images[0]->lien) }}" alt="" class="img-responsive" /></a>
                    </div>
                    @foreach ($product->images as $image )
                        <div class="thumb-img">
                            <a class="fancybox" href="{{ asset('mdltheme/images/'.$image->lien) }}" data-fancybox-group="gallery" title="Fromage 100% naturel"><img src="{{ asset('mdltheme/images/'.$image->lien) }}" alt="" class="img-responsive" /></a>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6 det-desc">
                    <div class="productdata">
                        <div class="infospan" >Type d'emabllage <span  style="padding: 0px !important">{{ $product->type_emb }}</span></div>
                        <div class="infospan">DLC <span>{{ $product->dlc }}</span></div>
                        <div class="average">
                        <div class="form-group">
                            <input type="hidden" value={{$rating}} id="rate-result">
                            <div class="rate"><span class="lbl">Note : </span>
                            </div>
                            <div class="rating-result"></div>
                            <div class="clearfix"></div>
                        </div>

                        </div>
                        <div class="sharing" >
                            <img src="{{ asset('/gout-naturel.png')}}" alt="" class="img-responsive"/>
                        </div>
                        <a href="{{ asset('/app-particular/order') }}" class="btn btn-default btn-red btn-lg"  style="margin-top: 10px;font-size:15px">Construire votre pack</a>
                    </div>
                </div>
            </div>

            <div class="tab-review">
                <ul id="myTab" class="nav nav-tabs shop-tab">
                    <li class="active"><a href="#desc" data-toggle="tab">Description</a></li>
                    <li class=""><a href="#rev" data-toggle="tab">Avis ({{ $comments->count() }})</a></li>
                </ul>
                <div id="myTabContent" class="tab-content shop-tab-ct">
                    <div class="tab-pane fade active in" id="desc">
                        <p>
                        {{ $product->long_description }}
                        </p>
                    </div>
                    <div class="tab-pane fade" id="rev">
                        <div id="add-comment">
                            @foreach($comments as $comment)
                            <p class="dash">
                            <span>{{ $comment->user->name }}</span> ({{ $comment->created_at->format('Y-m-d H:m') }}) | (<b>{{$comment->rating }}/5</b>)<br/>
                            {{ $comment->comment }}.
                            </p>
                            @endforeach
                        </div>

                        @Auth
                            <h5>Votre note :</h5>
                            <div class="my-rating"></div>
                            <h5>Commentaire :</h5>
                            <form id="comment-form" action="{{asset('/comment')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" id="comment" ></textarea>
                                </div>

                                <input type="hidden" id="product" value="{{ $product->id }}" >

                                <div id="show_comment_msg" >

                                </div>
                                <button class="btn btn-default btn-red btn-sm">Envoyer</button>
                            </form>
                        @else
                         <h5>Veuillez vous authentifier pour pouvoir poster un commentaire.</h5>
                         <a href="{{asset('/connexion')}}"><button class="btn btn-default btn-red">Se connecter</button></a> 
                        @endauth
                 
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
                            <span class="smalltitle cut-text"><a href="{{ url('product/'.$related_product->slug) }}">{{ $related_product->designation }}</a></span>
                            <span class="smalldesc">{{ $product->capacity }}</span>

                        </div>
                    </div>
                @endforeach
            </div><!--Products-->
            <div class="spacer"></div>
        </div><!--Main content-->
        
        <div class="col-md-3"><!--sidebar-->
            
                <div>
                  <img style="border-radius:10px" src="{{asset('/banner-02.jpg')}}" width="100%" height="100%" alt="" srcset="">
                </div>
    
        </div><!--sidebar-->
    </div>
</div>

@endsection
@push('comment-scripts')
<script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $("#comment-form").on("submit", function (e)
    {
        $('#show_comment_msg').html('<div >En cours....</div>');
        var comment = $('#comment').val();
        var product = $('#product').val();
        var rating = $('.my-rating').starRating('getRating');
        var formURL = $(this).attr("action");


        var data = {
            "_token": "{{ csrf_token() }}",
            comment: comment,
            product: product,
            rating: rating
        };
        $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: data,
                    success: function (res) {
                       if(res != 'error'){
                        $('#add-comment').append('<p class="dash"><span>'+res.name+'</span> ('+res.date+')<br/>'+res.comment+'</p>');
                        $('#show_comment_msg').html('<div class="alert alert-success mt-2 flash-alert" id="form-success" role="alert"> Commentaire ajouté !</div>');
                        $('#comment').val('').empty();
                        $(".flash-alert").slideDown(200).delay(3500).slideUp(200);
                       }
                       else{
                        window.location.replace('/connexion');
                       }
                    }
                });
        e.preventDefault();
    });

</script>
@endpush
