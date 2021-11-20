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
<html lang="ar" dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>ملتقى يوم الحليب</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">




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
	top: 430px;
	text-transform: capitalize;
	font-family: 'Cairo', sans-serif;
}
.name{
	color: rgb(114, 114, 114);
	z-index: 100;
  	position: absolute;
	top: 289px;
	right: 146px;
	font-family: 'Cairo', sans-serif;
}
.last{
	color: rgb(114, 114, 114);
	z-index: 100;
  	position: absolute;
	top: 317px;
	right: 146px;
	font-family: 'Cairo', sans-serif;
}
.wilaya{
	color: rgb(114, 114, 114);
	z-index: 100;
  	position: absolute;
	top: 345px;
	right: 146px;
	font-family: 'Cairo', sans-serif;
}

.alert-success {
    color: #3A7024 !important;
    background-color: #BFE2B0 !important;
    border-color: #6CBCBFE2B050 !important;
}


</style>
<body>
	<div class="main-wrapper">
		<div class="alert alert-success" role="alert">
			تم التسجيل بنجاح ! سعداء بالالتقاء بكم جميعًا، يرجى الاحتفاظ بالشارة الظاهرة في الأسفل 
		</div>
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				
				
				<div class="card" style="height: 519px ; width : 400px;">
                    <img src="{{asset('mdltheme/Badge.jpg')}}"  class="img" alt="">
					<h4 class="name ">{{$prenom}}</h4>
					<h4 class="last ">{{$nom}}</h4>
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