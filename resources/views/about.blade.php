@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="bread"><a href="#">Accueil</a> &rsaquo; A propos</div>
                        <div class="bigtitle">A propos</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9"><!--Main content-->
            <div id="title-bg">
                <div class="title">About Shopping</div>
            </div>
            <div class="page-content">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indusy standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesettin industry.
                </p>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indusy standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesettin industry.
                </p>
            </div>
        </div>
        <div class="col-md-3"><!--sidebar-->
            <div id="title-bg">
                <div class="title">Categories</div>
            </div>

            <div class="categorybox">
                <ul>
                    <li><a href="#">Zahra</a></li>
                    <li><a href="#">Noora</a></li>
                    <li><a href="#">jnan</a></li>
                </ul>
            </div>
            <div class="ads">
            </div>
        </div><!--sidebar-->
    </div>
    <div class="spacer"></div>
</div>

@endsection
