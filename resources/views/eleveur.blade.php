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
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
				<div class="col-md-12 col-xl-6 mx-auto">
				<div class="card">
                    <form method="POST" action="{{url('register-eleveur')}}">
                        @csrf
				            <div class="row">
                    <div class="col-md-4 pe-md-0">
                        <div class="auth-side-wrapper" style="background-image: url({{asset('/assets/images/milk.jpg')}}">
      
                        </div>
                      </div>
               
                <div class="col-md-8 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">MD<span>L</span></a>
                    <h5 class="text-muted fw-normal mb-4">Beinvenue ! merci de se connecter</h5>
                    <form class="forms-sample">
                      <div class="row mb-3">
                      <div class="col-md-6">
                        <label for="exampleInputUsername1" class="form-label">Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value = "{{old('nom')}}"id="exampleInputUsername1" autocomplete="Username" placeholder="Nom">
                        @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="userEmail" class="form-label">Prenom</label>
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{old('prenom')}}"  placeholder="Prenom">
                        @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                      </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="exampleFormControlSelect1" class="form-label">Type</label>
								<select class="form-select" name="type"  class="form-control input-default  @error('type') is-invalid @enderror" id="exampleFormControlSelect1">
                                    <option value="0">select</option>
                                  
                                        <option  value="e" @if (old('type') == "e" ) selected @endif  >Eleveur</option>
                                        <option  value="c" @if (old('type') == "c" ) selected @endif  >Collecteur</option>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                                </select>
                               
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                            <label for="exampleFormControlSelect1" class="form-label">Wilaya</label>
								         <select class="form-select select-wialaya" name="wilaya"  class="form-control input-default   @error('wilaya') is-invalid @enderror" >
                                    
                                   @foreach($wilayas as $wilaya)
                                   <option  value="{{$wilaya->wilaya_name_ascii}}" @if (old('wilaya') == $wilaya->wilaya_name_ascii) selected @endif    >{{$wilaya->wilaya_name_ascii}}</option>
                                    @endforeach
                                @error('wilaya')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                                </select>
                               
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1" class="form-label">Commune</label>
								                <select class="form-select" name="commune" id="select-commune" class="form-control input-default  @error('commune') is-invalid @enderror" >
                                    <option value="0">select</option>
                                  
                                    <option  value=""  ></option>
                                  
                                @error('commune')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                                </select>
                               
                            </div>
                            
                        </div>
                        <div class="mb-4">
                            <label class="form-check-label" for="authCheck">
                                Connaissez vous MDL ?
                              </label>
                            <div class="form-check form-check-inline">
                            <input type="checkbox" value="oui" name="check" class="form-check-input" id="checkInline">
                                <label class="form-check-label" for="checkInline">
                                  Oui
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                           <input type="checkbox" value="non" name="check" class="form-check-input" id="checkInlineChecked" >
                                <label class="form-check-label" for="checkInlineChecked">
                                   Non
                                </label>
                            </div>
                            
                          
                        </div>
                      
                      
                        
                        <button class="btn btn-primary" type="submit">Connecter</button>
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
	<script src="{{asset('/assets/vendors/feather-icons/feather.min.j')}}s"></script>
	<script src="{{asset('/assets/js/template.js')}}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<!-- End custom js for this page -->

  <script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	        });
          
		$(".select-wilaya").change(function() {
      
			var name = $(this).val();
      alert(name);
			$.ajax({
				url: '/get-commune/' + name,
				type: "GET",
				success: function (res) {
					$('#select-commune').val(res);
				}
			});
			
		});
  </script>
</body>
</html>