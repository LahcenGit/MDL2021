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

	<title>Eleveurs et collecteurs</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="{{asset('/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
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
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{asset('/assets/css/demo1/style.css')}}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{asset('/assets/images/favicon.png')}}" />
</head>

<style>
    .gain-section{
        padding: 40px;
        background-color: #FFEEEE;
    }
    .payment-section{
        padding: 40px;
        background-color: #D9FFFF;
    }
    .article-section{
        padding: 40px;
        background-color: #FFF9CC;
    }
    .order-section{
        padding: 40px;
        background-color: #CFFFE6;
    }
    .worker-section{
        padding: 40px;
        background-color: #DDDDDD;
    }
    .net-section{
        padding: 40px;
        width: 500px;
        background-color: #ffff;
    }

    .wilaya{
        padding: 20px;
        background-color: #EFEFEF;
        height: 80px;
        width: 150px;
        margin: 5px;
    }
    .title-st{
        
    }

    
</style>

<body>

    <div class="container ">
        <!-- row -->
      
                    <div class="row">
                        <div class="col-12">
                            <div class="card" >
                                <div class="row">
                                    <div class="card-body">
                                        <h6 class="card-title">Tableau des Eleveurs et collecteurs</h6>
                                        <div class="table-responsive">
                                            <table id="dataTableExample" class="table">
                                              <thead>
                                                <tr>
                                                  <th>#</th>
                                                  <th>Nom</th>
                                                  <th>Prenom</th>
                                                  <th>Wilaya</th>
                                                  <th>Type</th>
                                                  <th>Téléphone</th>
                                                  
                                                </tr>
                                              </thead>
                                              <tbody>
                                                  @foreach($eleveurs as $elev)
                                                <tr>
                                                  <td>{{$loop->iteration}}</td>
                                                  <td>{{$elev->nom}}</td>
                                                  <td>{{$elev->prenom}}</td>
                                                  <td>{{$elev->wilaya}}</td>
                                                  <td>{{$elev->type}}</td>
                                                  <td>{{$elev->phone}}</td>
                                              
                                               
                                                </tr>
                                               @endforeach
                                              </tbody>
                                            </table>
                                          </div>
    
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                  
            </div>
    </div>




<script src="{{asset('/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="{{asset('/assets/vendors/chartjs/Chart.min.js')}}"></script>
  <script src="{{asset('/assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
  <script src="{{asset('/assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
  <script src="{{asset('/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('/assets/js/data-table.js')}}"></script>
  <script src="{{asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{asset('/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('/assets/js/template.js')}}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{asset('/assets/js/dashboard-light.js')}}"></script>
  <script src="{{asset('/assets/js/datepicker.js')}}"></script>
	<!-- End custom js for this page -->


</body>
</html>    