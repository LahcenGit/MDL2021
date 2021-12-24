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
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          MDL<span>Check</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">

          <li class="nav-item nav-category">Main</li>
          <li class="nav-item {{ active_class(['milkcheck']) }}">
            <a href="{{url('/milkcheck')}}" class="nav-link {{ active_class(['milkcheck']) }}">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Vue d'enssemble</span>
            </a>
          </li>
          
          <li class="nav-item nav-category">Components</li>

          <li class="nav-item  {{ active_class(['milkcheck/vendeurs/*','milkcheck/vendeurs']) }}">
            <a class="nav-link"  data-bs-toggle="collapse" href="#vendeurs" role="button" aria-expanded="{{ is_active_route(['milkcheck/vendeurs/*','milkcheck/vendeurs']) }}" aria-controls="vendeurs">
              <i class="link-icon" data-feather="pie-chart"></i>
              <span class="link-title">Vendeurs</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['milkcheck/vendeurs/*','milkcheck/vendeurs']) }} " id="vendeurs">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('milkcheck/vendeurs/create')}}" class="nav-link {{ active_class(['milkcheck/vendeurs/create']) }}">Ajouter</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('milkcheck/vendeurs')}}" class="nav-link {{ active_class(['milkcheck/vendeurs']) }}">Tous</a>
                </li>
              </ul>
            </div>
          </li>


          <li class="nav-item {{ active_class(['milkcheck/achats/*','milkcheck/achats']) }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#achats" role="button" aria-expanded="{{ is_active_route(['milkcheck/achats/*','milkcheck/achats']) }}" aria-controls="achats">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Achats</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['milkcheck/achats/*','milkcheck/achats']) }}" id="achats">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('milkcheck/achats/create')}}" class="nav-link {{ active_class(['milkcheck/achats/create']) }}">Ajouter</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('milkcheck/achats')}}" class="nav-link {{ active_class(['milkcheck/achats']) }}">Tous</a>
                  </li>
              </ul>
            </div>
          </li>
          <li class="nav-item {{ active_class(['milkcheck/agrements/*','milkcheck/agrements']) }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#agrements" role="button" aria-expanded="{{ is_active_route(['milkcheck/agrements/*','milkcheck/agrements']) }}" aria-controls="agrements">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Agrements</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['milkcheck/agrements/*','milkcheck/agrements']) }}" id="agrements">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('milkcheck/agrements')}}" class="nav-link {{ active_class(['milkcheck/agrements']) }}">Agrements</a>
                </li>
               
                
              </ul>
            </div>
          </li>


          <li class="nav-item nav-category">Setting</li>
          <li class="nav-item {{ active_class(['milkcheck/profil']) }}">
            <a href="{{url('/milkcheck/profil')}}" class="nav-link {{ active_class(['milkcheck/profil']) }}">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Profile</span>
            </a>
          </li>
          
        </ul>
      </div>
    </nav>
    <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted mb-2">Sidebar:</h6>
        <div class="mb-3 pb-3 border-bottom">
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
            <label class="form-check-label" for="sidebarLight">
              Light
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
            <label class="form-check-label" for="sidebarDark">
              Dark
            </label>
          </div>
        </div>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme:</h6>
          <a class="theme-item active" href="../demo1/dashboard.html">
            <img src="{{asset('/assets/images/screenshots/light.jpg')}}" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme:</h6>
          <a class="theme-item" href="../demo2/dashboard.html">
            <img src="{{asset('/assets/images/screenshots/dark.jpg')}}" alt="light theme">
          </a>
        </div>
      </div>
    </nav>
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<form class="search-form">
						<div class="input-group">
              <div class="input-group-text">
                <i data-feather="search"></i>
              </div>
							<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
						</div>
					</form>
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
						
							<div class="dropdown-menu" aria-labelledby="languageDropdown">
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ms-1"> English </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ms-1"> French </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ms-1"> German </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ms-1"> Portuguese </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ms-1"> Spanish </span></a>
							</div>
            </li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="grid"></i>
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
									<p class="mb-0 fw-bold">Web Apps</p>
									<a href="javascript:;" class="text-muted">Edit</a>
								</div>
                <div class="row g-0 p-1">
                  <div class="col-3 text-center">
                    <a href="pages/apps/chat.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="message-square" class="icon-lg mb-1"></i><p class="tx-12">Chat</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/apps/calendar.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="calendar" class="icon-lg mb-1"></i><p class="tx-12">Calendar</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/email/inbox.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="mail" class="icon-lg mb-1"></i><p class="tx-12">Email</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/general/profile.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="instagram" class="icon-lg mb-1"></i><p class="tx-12">Profile</p></a>
                  </div>
                </div>
								<div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="mail"></i>
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
								<div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
									<p>9 New Messages</p>
									<a href="javascript:;" class="text-muted">Clear all</a>
								</div>
                <div class="p-1">
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Leonardo Payne</p>
                        <p class="tx-12 text-muted">Project status</p>
                      </div>
                      <p class="tx-12 text-muted">2 min ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Carl Henson</p>
                        <p class="tx-12 text-muted">Client meeting</p>
                      </div>
                      <p class="tx-12 text-muted">30 min ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Jensen Combs</p>
                        <p class="tx-12 text-muted">Project updates</p>
                      </div>
                      <p class="tx-12 text-muted">1 hrs ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Amiah Burton</p>
                        <p class="tx-12 text-muted">Project deatline</p>
                      </div>
                      <p class="tx-12 text-muted">2 hrs ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Yaretzi Mayo</p>
                        <p class="tx-12 text-muted">New record</p>
                      </div>
                      <p class="tx-12 text-muted">5 hrs ago</p>
                    </div>	
                  </a>
                </div>
								<div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="bell"></i>
								<div class="indicator">
									<div class="circle"></div>
								</div>
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
								<div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
									<p>6 New Notifications</p>
									<a href="javascript:;" class="text-muted">Clear all</a>
								</div>
                <div class="p-1">
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
											<i class="icon-sm text-white" data-feather="gift"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>New Order Recieved</p>
											<p class="tx-12 text-muted">30 min ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
											<i class="icon-sm text-white" data-feather="alert-circle"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>Server Limit Reached!</p>
											<p class="tx-12 text-muted">1 hrs ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>New customer registered</p>
											<p class="tx-12 text-muted">2 sec ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
											<i class="icon-sm text-white" data-feather="layers"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>Apps are ready for update</p>
											<p class="tx-12 text-muted">5 hrs ago</p>
                    </div>	
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
											<i class="icon-sm text-white" data-feather="download"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>Download completed</p>
											<p class="tx-12 text-muted">6 hrs ago</p>
                    </div>	
                  </a>
                </div>
								<div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
								<div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
									<div class="mb-3">
										<img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
									</div>
									<div class="text-center">
										<p class="tx-16 fw-bolder">Amiah Burton</p>
										<p class="tx-12 text-muted">amiahburton@gmail.com</p>
									</div>
								</div>
                <ul class="list-unstyled p-1">
                  <li class="dropdown-item py-2">
                    <a href="pages/general/profile.html" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="edit"></i>
                      <span>Edit Profile</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="repeat"></i>
                      <span>Switch User</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="log-out"></i>
                      <span>Log Out</span>
                    </a>
                  </li>
                </ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>

            @yield('content')

            <!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
				<p class="text-muted mb-1 mb-md-0">Copyright © 2021 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
				<p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
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
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{asset('/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('/assets/js/template.js')}}"></script>
	<!-- endinject -->

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
		$.ajax({
				url: '/data-f' ,
				type: "GET",
        async:false,
				success: function (results) {
          dataf = results.fats ;
          datad = results.days ;
       
				}
		});
					const labels = [
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			];
			const data = {
			labels: labels,
			datasets: [{
				label: 'My First dataset',
				backgroundColor: 'rgb(255, 99, 132)',
				borderColor: 'rgb(255, 99, 132)',
				data: [0, 10, 5, 2, 20, 30, 45],
			}]
			};

			const config = {
			type: 'line',
			data,
			options: {}
			};
		
		var myChart = new Chart(
		  document.getElementById('myChart'),
		  config
		);
	</script>

	<!-- Custom js for this page -->
  <script src="{{asset('/assets/js/dashboard-light.js')}}"></script>
  <script src="{{asset('/assets/js/datepicker.js')}}"></script>
	<!-- End custom js for this page -->
  
  @stack('select-vendeur-scripts')
  @stack('input-scripts')

<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(".show-achat").click(function() {
  
  var id = $(this).data('id');
 
  $.ajax({
    url: '/show-achat/' + id,
    type: "GET",
    success: function (res) {
      $('#modal-achat').html(res);
      $("#exampleModal").modal('show');
    }
  });
  
});

</script>



<script>
  var i ;
  var fs ;
  let  dataf ;
  let  datad ;

  
  
  $.ajax({
				url: '/data-f' ,
				type: "GET",
        async:false,
				success: function (results) {
          dataf = results.fats ;
          datad = results.days ;
       
				}
		});

 
 
     
var options = {
  chart: {
    type: 'line'
  },
  series: [{
    name: 'fats',
    data: dataf
    }],
  title: {
          text: 'Fat (g/L)',
          align: 'left'
        },
  xaxis: {
    categories: datad
  }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();


</script>


<script>
  var options = {
    chart: {
      type: 'line'
    },
    series: [{
      name: 'Desktops',
      data: [1025,1026,1027,1028,,1029,1030, 1031,1032]
    }],
   
       
    title: {
          text: 'Densité (degré dornic)',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
    xaxis: {
      categories:[30,40,35,50,49,60,70,91,125]
    }
  }
  
  var chart = new ApexCharts(document.querySelector("#chart2"), options);
  
  chart.render();
  </script>
  <script>
    var options = {
      chart: {
        type: 'line'
      },
      series: [{
        name: 'Desktops',
        data: [2.5,2.6,2.7,2.8,2.9,3,3.1,3.2,3.3]
      }],
      title: {
          text: 'Protéine (g/l)',
          align: 'left'
        },
      xaxis: {
        categories: [30,40,35,50,49,60,70,91,125]
      }
    }
    
    var chart = new ApexCharts(document.querySelector("#chart3"), options);
    
    chart.render();
    </script>

  
</body>
</html>    