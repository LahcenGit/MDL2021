<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maison du lait ! Naturellement Bon</title>

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
	<link rel="stylesheet" type="text/css" href="js/product/jquery.fancybox.css?v=2.1.5" media="screen" />
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
  </head>

  <style>
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


  </style>
  <body>
  <div id="wrapper">
	<div class="header"><!--Header -->
		<div class="container">
			<div class="row header-row mt-2" style="height: 90px; padding: 5px;">
				<div class="col-xs-6 col-md-4 main-logo " >
					<a href="index.html"><img src="mdltheme/images/logo.png" height="40%" width="40%" alt="logo-maison-du-lait" class="logo img-responsive" /></a>
				</div>

				<div class="col-md-4" >
				   <span class="main-text">Naturellement Bon ! </span>
				</div>

				<div class="col-md-4">
					<div class="pushright">
						<div class="top">
							@guest
							<a href="{{ url('/connexion') }}" id="reg" class="btn btn-default btn-custom">Se Connecter <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
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
								<li><a href="index.html" class="active">Home</a><div class="curve"></div></li>
								<li class="dropdown menu-large">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Mega Menu</a>
									<ul class="dropdown-menu megamenu container row">
										<li class="col-sm-4">
											<h4>Page Template</h4>
											<ul>
												<li><a href="index.html">Home Page</a></li>
												<li><a href="category.html">Category Page</a></li>
												<li><a href="category-list.html">Category List Page</a></li>
												<li><a href="category-fullwidth.html">Category List Page</a></li>
												<li><a href="product.html">Detail Product Page</a></li>
												<li><a href="page-sidebar.html">Page with sidebar</a></li>
												<li><a href="register.html">Register Page</a></li>
												<li><a href="checkout.html">Checkout Page</a></li>
												<li><a href="contact.html">Contact Page</a></li>
											</ul>
											<div class="dashed-nav"></div>
										</li>
										<li class="col-sm-4">
											<h4>Page Template</h4>
											<ul>
												<li><a href="index.html">Home Page</a></li>
												<li><a href="category.html">Category Page</a></li>
												<li><a href="category-list.html">Category List Page</a></li>
												<li><a href="category-fullwidth.html">Category List Page</a></li>
												<li><a href="product.html">Detail Product Page</a></li>
												<li><a href="page-sidebar.html">Page with sidebar</a></li>
												<li><a href="register.html">Register Page</a></li>
												<li><a href="checkout.html">Checkout Page</a></li>
												<li><a href="contact.html">Contact Page</a></li>
											</ul>
											<div class="dashed-nav"></div>
										</li>
										<li class="col-sm-4">
											<h4>Page Template</h4>
											<ul>
												<li><a href="index.html">Home Page</a></li>
												<li><a href="category.html">Category Page</a></li>
												<li><a href="category-list.html">Category List Page</a></li>
												<li><a href="category-fullwidth.html">Category List Page</a></li>
												<li><a href="product.html">Detail Product Page</a></li>
												<li><a href="page-sidebar.html">Page with sidebar</a></li>
												<li><a href="register.html">Register Page</a></li>
												<li><a href="checkout.html">Checkout Page</a></li>
												<li><a href="contact.html">Contact Page</a></li>
											</ul>
											<div class="dashed-nav"></div>
										</li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">List <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="index.html">Home Page</a></li>
										<li><a href="category.html">Category Page</a></li>
										<li><a href="category-list.html">Category List Page</a></li>
										<li><a href="category-fullwidth.html">Category List Page</a></li>
										<li><a href="product.html">Detail Product Page</a></li>
										<li><a href="page-sidebar.html">Page with sidebar</a></li>
										<li><a href="register.html">Register Page</a></li>
										<li><a href="order.html">Order Page</a></li>
										<li><a href="checkout.html">Checkout Page</a></li>
										<li><a href="contact.html">Contact Page</a></li>
									</ul>
								</li>
								<li><a href="page-sidebar.html">A propos</a></li>
								<li><a href="category.html">Produits</a></li>
								<li><a href="contact.html">Contactez-nous</a></li>
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
						<div class="title-widget">Facebook posts</div>
					</div>
					<ul class="tweets">
						<li>La nouvelle FETA piments' <a href="#">http://t.co/LbLwldb6 </a>
						<span>2 hours ago</span></li>
						<li class="lastone">Check out this great #themeforest item for you
						'Simpler Landing' <a href="#">http://t.co/LbLwldb6 </a>
						<span>2 hours ago</span></li>
					</ul>
					<div class="clearfix"></div>
					<a href="#" class="btn btn-default btn-follow"><i class="fa fa-twitter fa-2x"></i><div>Follow us on twitter</div></a>
				</div><!--footer twitter widget-->
				<div class="col-md-4"><!--footer newsletter widget-->
					<div id="title-widget-bg">
						<div class="title-widget">Newsletter</div>
					</div>
					<div class="newsletter">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
						<form role="form">
							<div class="form-group">
								<label>Votre adresse Email</label>
								<input type="email" class="form-control newstler-input" id="exampleInputEmail1" placeholder="Enter email">
								<button class="btn btn-default btn-red btn-sm">Sign Up</button>
							</div>
						</form>
					</div>
				</div><!--footer newsletter widget-->
				<div class="col-md-4"><!--footer contact widget-->
					<div id="title-widget-bg">
						<div class="title-widget-cursive">MDL</div>
					</div>
					<ul class="contact-widget">
						<li class="fphone">+213 123 456, +387 123 456 <br /> +213 123 456</li>
						<li class="fmobile">+213-123-456-1<br />+213-123-456-2</li>
						<li class="fmail lastone">your@email.com<br />customer.care@mail.com</li>
					</ul>
				</div><!--footer contact widget-->
			</div>
			<div class="spacer"></div>
		</div>
	</div><!--footer Widget-->
	<div class="footer"><!--footer-->
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<ul class="footermenu"><!--footer nav-->
						<li><a href="index.html">Home</a></li>
						<li><a href="cart.html">My Cart</a></li>
						<li><a href="checkout.html">Checkout</a></li>
						<li><a href="order.html">Completed Orders</a></li>
						<li><a href="contact.html">Contact us</a></li>
					</ul><!--footer nav-->
					<div class="f-credit">&copy;All rights reserved by <a href="#">yoursite.com</a></div>
					<a href=""><div class="payment visa"></div></a>
					<a href=""><div class="payment paypal"></div></a>
					<a href=""><div class="payment mc"></div></a>
					<a href=""><div class="payment nh"></div></a>
				</div>
				<div class="col-md-3"><!--footer Share-->
					<div class="followon">Follow us on</div>
					<div class="fsoc">
						<a href="http://twitter.com/minimalthemes" class="ftwitter">twitter</a>
						<a href="http://www.facebook.com/pages/Minimal-Themes/264056723661265" class="ffacebook">facebook</a>
						<a href="#" class="fflickr">flickr</a>
						<a href="#" class="ffeed">feed</a>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div><!--footer Share-->
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
	<script type="text/javascript" src="{{ asset('js/demo.js') }}"></script>

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

	</div>
  </body>
</html>
