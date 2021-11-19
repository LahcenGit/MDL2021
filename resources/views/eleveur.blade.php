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

<style>
  .image{
    margin-top: -40px;
  }
  .title{
    font-weight: 500;
    color: #6CBC50;
  }
  .badge{
    color: #2157A5;
    font-size: 13px;
    padding: 0;
   
  }
</style>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				
				<div class="card col-md-8">
            <form method="POST" action="{{url('register-eleveur')}}">
                @csrf
               
                <div class="col-md-12 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">

                    <div class="d-flex align-items-center image justify-content-center">
                      <img src="{{asset('mdltheme/logo.jpg')}}" alt="">
                    </div>
                    
                    <h5 class="text-muted fw-normal">Bienvenue sur la page d'enregistrement de <span class="title"> La journnée du lait</span></h5>
                    <h5 class=" badge fw-normal mb-3 ">Vous pouvez dès à présent avoir votre badge </h5>
                    <form class="forms-sample">
                      <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="exampleInputUsername1" class="form-label">Nom* :</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value = "{{old('nom')}}" placeholder="Nom" required>
                        @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="userEmail" class="form-label">Prenom* :</label>
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{old('prenom')}}"  placeholder="Prenom" required>
                        @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                      </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                             <label for="exampleFormControlSelect1" class="form-label">Vous êtes* :</label>
					                        <select class="form-select" name="type"  class="form-control input-default  @error('type') is-invalid @enderror" id="exampleFormControlSelect1" required>
                                   
                                  
                                    <option  value="eleveur" @if (old('type') == "eleveur" ) selected @endif  >Eleveur</option>
                                    <option  value="collecteur" @if (old('type') == "collecteur" ) selected @endif  >Collecteur</option>
                                    <option  value="veterinaire" @if (old('type') == "veterinaire" ) selected @endif  >Vétérinaire</option>
                                    <option  value="autre" @if (old('type') == "autre" ) selected @endif  >Autre</option>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                                </select>
                               
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-6 mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Wilaya* :</label>
								             <select class="form-select select-wilaya" name="wilaya"  class="form-control input-default   @error('wilaya') is-invalid @enderror" required >
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
                            <div class="col-md-6  mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Commune* :</label>
								                <select class="form-select" name="commune" id="select-commune" class="form-control input-default " required >
                         
                                </select>
                               
                            </div>
                            
                        </div>
                        <div class="mb-4">
                            <label class="form-check-label" for="authCheck">
                                Connaissez vous la maison du lait ?
                              </label>
                              <div class="row mt-3" style="margin-left:1px !important; ">
                                <div class="form-check col-2">
                                  <input class="form-check-input" type="radio" name="check" value="oui" id="flexRadioDefault1" checked>
                                  <label class="form-check-label" for="flexRadioDefault1">
                                  Oui
                                  </label>
                                </div>
                                <div class="form-check col-2">
                                  <input class="form-check-input" type="radio" name="check" value="non" id="flexRadioDefault2" >
                                  <label class="form-check-label" for="flexRadioDefault2">
                                    Non
                                  </label>
                                </div>
                              </div>
                        </div>
                      
                      
                        <div class="d-flex align-items-center justify-content-center">
                          <button class="btn btn-primary" type="submit">Inscrire et obtenir votre badge</button>
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
      var data ="";
     
			$.ajax({
				url: '/get-commune/' + name,
				type: "GET",
				success: function (res) {
          
        
					$.each(res, function(i, res) {

            data = data + '<option value="'+ res.commune_name_ascii+ '">'+ res.commune_name_ascii + '</option>';
            
					});

          $('#select-commune').html(data);
				}
			});

     
			
		});
  </script>
</body>
</html>