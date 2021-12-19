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
<html lang="ar "dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
 
	<title>ملتقى يوم الحليب</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">


  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">

	



  

  <link rel="shortcut icon" href="{{asset('/assets/images/faviconmdl.png')}}" />
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
  .alert{
    color: red;
    font-size: 15px;
    padding: 0;
    font-weight: 800;
  }
 

  
</style>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				
				<div class="card col-md-8">
            <form method="POST" action="{{url('journeedulait')}}">
                @csrf
               
                <div class="col-md-12 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">

                    <div class="d-flex align-items-center image justify-content-center">
                      <img src="{{asset('mdltheme/logo.jpg')}}" alt="">
                    </div>
                    
                    <h5 class="text-muted fw-normal">مرحبا بكم في صفحة التسجيل الخاصة  <span class="title"> بملتقى يوم الحليب</span> يوم 30 نوفمبر بفندق رونيسانس تلمسان</h5>
                    <p class=" badge "> عند اتمام التسجيل ستظهر لكم شارة الدخول الخاصة بكم! يرجى الاحتفاظ بها  </p> <br>
                    <p class="alert"> كتدابير وقائية خاصة بجائحة كورونا سيكون الدخول متاح فقط للمهنيين مربي،فلاح،بيطري...شكرا لتفمكم   </p>
                    <form class="forms-sample">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="userEmail" class="form-label">الإسم* :</label>
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{old('prenom')}}"  placeholder="الأسم" required>
                        @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="exampleInputUsername1" class="form-label">اللّقب* :</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value = "{{old('nom')}}" placeholder="اللّقب" required>
                        @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                      </div>
                     
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                             <label for="exampleFormControlSelect1" class="form-label">هل أنتم* :</label>
					                        <select class="form-select" name="type"  class="form-control input-default  @error('type') is-invalid @enderror" id="exampleFormControlSelect1" required>
                                   
                                  
                                    <option  value="مربي" @if (old('type') == "مربي" ) selected @endif  >مربي</option>
                                    <option  value="فلاح" @if (old('type') == "فلاح" ) selected @endif  >فلاح</option>
                                    <option  value="جامع الحليب" @if (old('type') == "جامع الحليب" ) selected @endif>جامع الحليب</option>
                                    <option  value="بيطري" @if (old('type') == "بيطري" ) selected @endif  >بيطري</option>
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
                            <label for="exampleFormControlSelect1" class="form-label">الولاية* :</label>
								             <select class="form-select select-wilaya" name="wilaya"  class="form-control input-default   @error('wilaya') is-invalid @enderror" required >
                                   @foreach($wilayas as $wilaya)
                                   <option  value="{{$wilaya->wilaya_name}}" @if (old('wilaya') == $wilaya->wilaya_name) selected @endif    >{{$wilaya->wilaya_name}}</option>
                                    @endforeach
                                @error('wilaya')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                                </select>
                               
                            </div>
                            <div class="col-md-6  mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">البلدية* :</label>
								                <select class="form-select" name="commune" id="select-commune" class="form-control input-default " required >
                         
                                </select>
                               
                            </div>



                            
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="userEmail" class="form-label">رقم الهاتف* :</label>
                          <input type="text" class="form-control" value="{{old('phone')}}" name="phone" placeholder="رقم الهاتف" required>
                         
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="exampleInputUsername1" class="form-label">الايميل :</label>
                          <input type="text" class="form-control" name="email" placeholder="الايميل" >
                         
                        </div>


                        <div class="mb-4">
                            <label class="form-check-label" for="authCheck">
                                هل تعرفون مسبقا دار الحليب؟
                              </label>
                              <div class="row mt-3" style="margin-left:1px !important; ">
                                <div class="form-check col-2">
                                  <input class="form-check-input" type="radio" name="check" value="نعم" id="flexRadioDefault1" checked>
                                  <label class="form-check-label" for="flexRadioDefault1">
                                  نعم
                                  </label>
                                </div>
                                <div class="form-check col-2">
                                  <input class="form-check-input" type="radio" name="check" value="لا" id="flexRadioDefault2" >
                                  <label class="form-check-label" for="flexRadioDefault2">
                                    لا
                                  </label>
                                </div>
                              </div>
                        </div>
                      
                      
                        <div class="d-flex align-items-center justify-content-center">
                          <button class="btn btn-primary" type="submit">سجل وأحصل على شارة الدخول </button>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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

            data = data + '<option value="'+ res.commune_name+ '">'+ res.commune_name + '</option>';
            
					});

          $('#select-commune').html(data);
				}
			});


     
			
		});
  </script>
</body>
</html>