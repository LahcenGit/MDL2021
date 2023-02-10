@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; Recettes </div>
                        <div class="bigtitle" style="color:#1847AD">Recettes</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"><!--Main content-->
            <div id="title-bg">
                <div class="title">Nos recettes seront disponible prochainement !</div>
            </div>

            <div class="f-widget featpro">
                <div style="padding :10px; background-color :#D5D8DB">
                  <img src="{{asset('/recipe.jpg')}}" height="100%" width="100%" alt="">
                </div>
            </div>
            <div class="page-content" style="margin-top: 20px;">
                <p>
                </p>
               
            </div>
        </div>
       
    </div>
    <div class="spacer"></div>
</div>

@endsection
