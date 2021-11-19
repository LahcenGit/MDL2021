<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Purchase: https://1.envato.market/nobleui_admin
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>NobleUI - HTML Bootstrap 5 Admin Dashboard Template</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{asset('/assets/css/demo1/style.css')}}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{asset('/assets/images/favicon.png')}}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<style>

.img{
	position: absolute;
	height: 100%;
	width: 100%;
}
.type{
	color: #ffff;
	z-index: 100;
  	position: absolute;
	top: 435px;
	text-transform: capitalize;
}
.name{
	color: rgb(114, 114, 114);
	z-index: 100;
  	position: absolute;
	top: 285px;
	left: 115px;
	font-family: 'Montserrat', sans-serif;
}
.last{
	color: rgb(114, 114, 114);
	z-index: 100;
  	position: absolute;
	top: 316px;
	left: 140px;
	font-family: 'Montserrat', sans-serif;
}
.wilaya{
	color: rgb(114, 114, 114);
	z-index: 100;
  	position: absolute;
	top: 347px;
	left: 130px;
	font-family: 'Montserrat', sans-serif;
}


</style>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				
				
				<div class="card" style="height: 519px ; width : 400px;">
                    <img src="{{asset('mdltheme/Badge.jpg')}}"  class="img" alt="">
					<h4 class="name ">{{$nom}}</h4>
					<h4 class="last ">{{$prenom}}</h4>
					<h4 class="wilaya ">{{$wilaya}}</h4>
					<div class="d-flex align-items-center justify-content-center">
						<h3 class="type ">{{$type}}</h3>
					</div>
					
				</div>

			</div>
		</div>
	</div>


</body>
</html>