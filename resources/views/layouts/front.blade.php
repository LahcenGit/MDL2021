<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maison du lait ! Naturellement Bon</title>


	 <!-- Favicon -->

	 <link rel="shortcut icon" href="{{asset('/assets/images/logo.png')}}" />

    <!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='{{ asset('mdltheme/font-awesome/css/font-awesome.css') }}' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->


    <link href="{{ asset('mdltheme/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Main Style -->
	<link rel="stylesheet" href="{{ asset('mdltheme/style.css') }}" />
	<!-- owl Style -->
	<link rel="stylesheet" href="{{ asset('mdltheme/css/owl.carousel.css') }}" />
	<link rel="stylesheet" href="{{ asset('mdltheme/css/owl.transitions.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('mdltheme/js/product/jquery.fancybox.css?v=2.1.5') }}" media="screen" />
	<link href='https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

		<style>
			.main-logo{
					height:85%;
					width:85%;
			}
			.main-text{
				color: white;
				font-family: 'Sacramento', cursive;
				font-size: 30px;
			}
			.header-row{
				display: -ms-flexbox;
				display: -webkit-flex;
				display: flex;

				-ms-flex-align: center;
				-webkit-align-items: center;
				-webkit-box-align: center;
				align-items: center;
			}
			.btn-custom{
				display: inline-block;
				margin-bottom: 0;
				font-weight: 400;
				text-align: center;
				vertical-align: middle;
				cursor: pointer;
				background-image: none;
				border: 1px solid transparent;
					border-top-color: transparent;
					border-right-color: transparent;
					border-bottom-color: transparent;
					border-left-color: transparent;
				white-space: nowrap;
				padding: 6px 12px;
				font-size: 14px;
				line-height: 1.42857143;
				border-radius: 30px;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
				color: #fff;
				background-color: #74BE40;
				border-color: #74BE40;
				transition: transform 250ms;
			}
			.btn-custom:hover{

				color: rgb(65, 65, 65);
				background-color: #fff;
				border-color: #fff;
				transform: translateY(-2px);
			}

			@media (max-width:500px){
				.main-text{
					font-size: 22px;
				}
				.main-logo{
					height:100%;
					width:100%;
				}
				.btn-custom{
					font-size: 11px;
				}

			}

	</style>
  </head>


  <body>
  <div id="wrapper">
	<div class="header"><!--Header -->
		<div class="container">
			<div class="row header-row mt-2" style="height: 90px; padding: 5px;">
				<div class="col-xs-4 col-md-2">
					<a href="#"><img src="{{asset('mdltheme/images/logo.png')}}"  alt="logo-maison-du-lait" class="logo img-responsive main-logo" /></a>
				</div>

				<div class="col-xs-4 col-md-8 text-center">
				   <span class="main-text">Naturellement Bon ! </span>
				</div>

				<div class="col-xs-4 col-md-2">
					<div class="pushright">
						<div class="top">
							@guest
							<a href="{{ url('/connexion') }}" id="reg" class="btn btn-default btn-custom">Se Connecter <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            @else
                                @if(Auth::user()->type == 'particulier')
                                <a href="{{ url('/app-particular') }}" id="reg" class="btn btn-default btn-custom">Dashboard <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                @elseif(Auth::user()->type == 'professionnel')
                                <a href="{{ url('/app-professional') }}" id="reg" class="btn btn-default btn-custom">Dashboard <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                @endif
				            @endguest
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="dashed"></div>
	</div><!--Header -->
	<div class="main-nav"><!--end main-nav -->
		<div class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li><a href="{{asset('/')}}" class="active">Accueil</a><div class="curve"></div></li>
								<li><a href="#">Produits</a></li>
								<li><a href="#">A propos</a></li>
								<li><a href="{{ asset('/contact') }}">Contactez-nous</a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div><!--end main-nav -->

@yield('content')

	<div class="f-widget"><!--footer Widget-->
		<div class="container">
			<div class="row">
				<div class="col-md-4"><!--footer twitter widget-->
					<div id="title-widget-bg">
						<div class="title-widget">La maison du lait</div>
					</div>
					<ul class="tweets">
						<li>La laiteire La Maison du lait S.A.R.L est une entreprise familiale Algérienne.
						<span> créée en 1999</span></li>

					</ul>
					<div class="clearfix"></div>
					<a href="https://www.facebook.com/MDLTLEMCEN" class="btn btn-default btn-follow"><i class="fa fa-facebook fa-2x"></i><div>Facebook</div></a>
					<a href="https://www.instagram.com/maison.dulait/" class="btn btn-default btn-follow"><i class="fa fa-instagram fa-2x"></i><div>Instagram</div></a>
				</div><!--footer twitter widget-->
				<div class="col-md-4"><!--footer newsletter widget-->
					<div id="title-widget-bg">
						<div class="title-widget">Notre Newsletter </div>
					</div>
					<div class="newsletter">
						<p>
							Nous vous invitons à vous inscrire à notre newsletter afin de recevoir toutes les mises à jour
						</p>
						<form role="form">
							<div class="form-group">
								<label>Votre adresse Email</label>
								<input type="email" class="form-control newstler-input" id="exampleInputEmail1" placeholder="Enter email">
								<button class="btn btn-default btn-red btn-sm">S'inscrire</button>
							</div>
						</form>
					</div>
				</div><!--footer newsletter widget-->
				<div class="col-md-4"><!--footer contact widget-->
					<div id="title-widget-bg">
						<div class="title-widget">Contactez-nous</div>
					</div>
					<ul class="contact-widget">
						<li class="fphone">+213 560 09 90 33</li>
						<li class="fmail lastone">contact@lamaisondulait.dz</li>
						<li class="fmobile">ZI remchi bp 322 Tlemcen-, lgerie </li>
					</ul>
				</div><!--footer contact widget-->
			</div>
			<div class="spacer"></div>
		</div>
	</div><!--footer Widget-->

	<div class=""><!--footer-->
		<div class="container">
			<div class="row">
				<div class="col-md-9" style="margin: 20px;">
					<div class="f-credit">&copy;Développé par <a href="#">MDL Dev Team </a></div>
				</div>

			</div>
		</div>
	</div><!--footer-->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('mdltheme/bootstrap/js/bootstrap.min.js') }}"></script>

	<!-- map -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script type="text/javascript" src="{{ asset('mdltheme/js/jquery.ui.map.js') }}"></script>
	<script type="text/javascript" src="{{ asset('mdltheme/js/demo.js') }}"></script>

	<!-- owl carousel -->
    <script src="{{ asset('mdltheme/js/owl.carousel.min.js') }}"></script>

	<!-- rating -->
	<script src="{{ asset('mdltheme/js/rate/jquery.raty.js') }}"></script>
	<script src="{{ asset('mdltheme/js/labs.js') }}" type="text/javascript"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="{{ asset('mdltheme/js/product/lib/jquery.mousewheel-3.0.6.pack.js') }}"></script>

	<!-- fancybox -->
    <script type="text/javascript" src="{{ asset('mdltheme/js/product/jquery.fancybox.js?v=2.1.5') }}"></script>

	<!-- custom js -->
    <script src="{{ asset('mdltheme/js/shop.js') }}"></script>

	<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.13.1/i18n/fr-FR.json"></script>

	<script>
		$(document).ready( function () {
  			  $('#myTable').DataTable();

		} );
	</script>


	@stack('order-pro-front')
    @stack('contact-scripts')
    @stack('comment-scripts')
	</div>
  </body>
</html>
