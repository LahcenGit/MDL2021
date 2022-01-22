<!DOCTYPE html>

<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>La maison du lait </title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="{{asset('/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('/assets/vendors/core/core.css')}}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">

	<link rel="stylesheet" href="{{asset('/assets/vendors/select2/select2.min.css')}}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{asset('/assets/css/demo1/style.css')}}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{asset('/assets/images/logo.png')}}" />

  

      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet"> 

  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<style>


    .title-nature{
      font-size: 2em;
      color: #6FB53E;
      font-family: 'Dancing Script', cursive;

    }
    #my-canvas{
      position: relative;
  top:0;
  left: 0;
 
}


#settings {
  white-space: nowrap;
  display: inline-block;
  overflow: hidden;
  position: absolute;

  left: 0;
  right: 0;

 
}
</style>
<body>

  




<div class="container" style="margin-top: 40px; padding:1rem 1rem;">

    <div class="card">
      <div class="card-body d-flex justify-content-center align-items-center">

        <img src="{{asset("assets/images/logo.png")}}"  height="117px" width="150px" alt="" srcset="">
        <span class="title-nature">Naturellement bon !</span> 

      </div>
    </div>
</div>

<div class="main-wrapper">

		<div class="container" style="margin-top: 5px;">

     

            @yield('content')

            <!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
				<p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="#" target="_blank">MDL TEAM</a>.</p>
			</footer>
			<!-- partial -->
		
		</div>
</div>



  

	<!-- core:js -->
	<script src="{{asset('/assets/vendors/core/core.js')}}"></script>


	<!-- endinject -->
	<!-- Plugin js for this page -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="{{asset('/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('/assets/js/data-table.js')}}"></script>
  <script src="{{asset('/assets/vendors/chartjs/Chart.min.js')}}"></script>
  <script src="{{asset('/assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
  <script src="{{asset('/assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
  <script src="{{asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendors/select2/select2.min.js')}}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{asset('/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('/assets/js/template.js')}}"></script>
	<!-- endinject -->

  <script src="{{asset('/assets/print/printThis.js')}}"></script>


	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	

	<!-- Custom js for this page -->
  <script src="{{asset('/assets/js/dashboard-light.js')}}"></script>
  <script src="{{asset('/assets/js/datepicker.js')}}"></script>
  <script src="{{asset('/assets/js/select2.js')}}"></script>
	<!-- End custom js for this page -->
  
  @stack('order-scripts')


  <script>

    if($('.select-date').val() == 'p'){
      $('.date-section').show();
    }
    $('.select-date').on('change', function() {
      if(this.value == 'p'){
        $('.date-section').show();
        $('.date').prop('required',true);
      }
      else{
        $('.date-section').attr('style', 'display: none !important');
        $('.date').prop('required',false);
      }
    });
  
  </script>
 
</body>
</html>   
