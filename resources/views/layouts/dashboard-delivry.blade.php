<!DOCTYPE html>

<html lang="en">
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
        <link rel="stylesheet" href="{{ asset('/assets/vendors/simplemde/simplemde.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/vendors/dropify/dist/dropify.min.css') }}">
        <!-- End plugin css for this page -->

        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('/assets/fonts/feather-font/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">

        <link rel="stylesheet" href="{{asset('/assets/vendors/select2/select2.min.css')}}">
        <!-- endinject -->

        <!-- Layout styles -->
        <link rel="stylesheet" href="{{asset('/assets/css/demo1/style.css')}}">
        <!-- End layout styles -->

        <link rel="shortcut icon" href="{{asset('/assets/zahra-profile.png')}}" />
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <style>
        #loading-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
  display: flex;
  align-items: center;
  justify-content: center;
}

#loading-spinner {
  width: 50px;
  height: 50px;
  border: 3px solid #fff;
  border-top-color: transparent;
  border-radius: 50%;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    </style>


<body>

    


	
            @yield('content')



            


	<!-- core:js -->

	<script src="{{asset('/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="{{asset('/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('/assets/js/data-table.js')}}"></script>

    <script src="{{asset('/assets/vendors/dropify/dist/dropify.min.js') }}"></script>
    <script src="{{asset('/assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('/assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{asset('/assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendors/select2/select2.min.js')}}"></script>
    <script src="{{ asset('/assets/vendors/tinymce/tinymce.min.js') }}"></script>

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
    <script src="{{asset('/assets/js/dropify.js') }}"></script>
    <script src="{{ asset('/assets/js/tinymce.js') }}"></script>
    <script src="{{ asset('/assets/js/tinymce.js') }}"></script>

	<!-- End custom js for this page -->
    
    @stack('deliver-position-script')
</html>
