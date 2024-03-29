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

	<title>La maison du lait </title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('/assets/vendors/core/core.css')}}">
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

  <link rel="shortcut icon" href="{{asset('/assets/zahra-profile.png')}}" />

</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
				<div class="card">
                 <form method="POST" action="{{ route('login') }}">
                        @csrf
				<div class="row">
                <div class="col-md-4 pe-md-0">
                  <div class="auth-side-wrapper" style="background-image: url({{asset('/assets/images/milk.jpg')}}">

                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">MDL<span>Labo</span></a>
                    <h5 class="text-muted fw-normal mb-4">Bienvenue ! merci de se connecter</h5>
                    <form class="forms-sample">
                      <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" id="userEmail" placeholder="Email">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                    </div>
                      <div class="mb-3">
                        <label for="userPassword" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="userPassword" autocomplete="current-password" placeholder="Password">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                         @enderror
                    </div>
                    <div class="single-checkbox mt-3">
                        <div class="checkbox-inline">
                            <input class="check-input" type="checkbox" id="check15" name="remember_me">
                            <label class="checkbox-label" for="check15"> Se souvenir de moi </label>
                        </div>
                        <div class="forgot-password">

                    </div>

                      <div>
                        <button type="submit" class="btn btn-primary mt-3">
                            {{ __('Se connecter') }}
                        </button>

                      </div>

                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="{{asset('/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{asset('/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('/assets/js/template.js')}}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<!-- End custom js for this page -->

</body>
</html>
