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
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            MDL<span>Adv</span>
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
          <li class="nav-item">
            <a href="{{url('adv')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Clients</li>
          <li class="nav-item {{ active_class(['adv/professionals/*','adv/professionals']) }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#professionals" role="button" aria-expanded="{{ is_active_route(['adv/professionals/*','adv/professionals']) }}" aria-controls="professionals">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Professionnels</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['adv/professionals/*','adv/professionals']) }}" id="professionals">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ asset('adv/professionals/create') }}" class="nav-link {{ active_class(['adv/professionals/create']) }}">Ajouter</a>
                </li>
                <li class="nav-item">
                  <a href="{{ asset('adv/professionals') }}" class="nav-link {{ active_class(['adv/professionals']) }}">Tous</a>
                </li>


              </ul>
            </div>
          </li>
          <li class="nav-item {{ active_class(['adv/particulars/*','adv/particulars']) }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#particulars" role="button" aria-expanded="{{ is_active_route(['adv/particulars/*','adv/particulars']) }}" aria-controls="particulars">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Particuliers</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['adv/particulars/*','adv/particulars']) }}" id="particulars">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ asset('adv/particulars/create') }}" class="nav-link">Ajouter</a>
                </li>
                <li class="nav-item">
                  <a href="{{ asset('adv/particulars') }}" class="nav-link {{ active_class(['adv/particulars']) }}">Tous</a>
                </li>
             </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Gestion des ventes</li>
          <li class="nav-item {{ active_class(['adv/orders/*','adv/orders']) }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#commandes" role="button" aria-expanded="{{ is_active_route(['adv/orders/*','adv/orders']) }}" aria-controls="orders">
              <i class="link-icon" data-feather="command"></i>
              <span class="link-title">Anciennes</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['adv/orders/*','adv/orders']) }}" id="commandes">
              <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="{{url('adv/orders')}}" class="nav-link {{ active_class(['adv/orders']) }}">Liste commandes</a>
                  </li>
              </ul>
            </div>
          </li>
          <li class="nav-item {{ active_class(['adv/particular-orders/*','adv/particular-orders']) }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#commandesPaticular" role="button" aria-expanded="{{ is_active_route(['adv/particular-orders/*','adv/particular-orders']) }}" aria-controls="ordersparticulier">
              <i class="link-icon" data-feather="command"></i>
              <span class="link-title">Particuliers</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['adv/particular-orders/*','adv/particular-orders']) }}" id="commandesPaticular">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('adv/add-order-particular')}}" class="nav-link {{ active_class(['adv/add-order-particular']) }}">Ajouter</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('adv/particular-orders')}}" class="nav-link {{ active_class(['adv/particular-orders']) }}">Liste commandes</a>
                  </li>
              </ul>
            </div>
          </li>

          <li class="nav-item {{ active_class(['adv/professional-orders/*','adv/professional-orders']) }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#commandesPro" role="button" aria-expanded="{{ is_active_route(['adv/professional-orders/*','dashboard-admin/professional-orders']) }}" aria-controls="ordersprofessional">
              <i class="link-icon" data-feather="command"></i>
              <span class="link-title">Professionnels</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['adv/professional-orders/*','adv/professional-orders']) }}" id="commandesPro">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('adv/professional-orders/create')}}" class="nav-link {{ active_class(['adv/professional-orders/create']) }}">Ajouter</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('adv/professional-orders')}}" class="nav-link {{ active_class(['adv/professional-orders']) }}">Liste commandes</a>
                  </li>
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Setting</li>
          <li class="nav-item">
            <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
              <i class="link-icon" data-feather="settings"></i>
              <span class="link-title">Setting</span>
            </a>
          </li>
        </ul>
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
									<p>Notifications</p>
									<a href="javascript:;" class="text-muted">Clear all</a>
								</div>
                        <div class="p-1">
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                                    <i class="icon-sm text-white" data-feather="gift"></i>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>Fonctionnalité  </p>
                                <p class="tx-12 text-muted">en développement</p>
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
                            <img class="wd-30 ht-30 rounded-circle" src="{{url('assets/zahra-profile.png')}}" alt="profile">
                        </a>
                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="mb-3">
                                    <img class="wd-80 ht-80 rounded-circle" src="{{url('assets/zahra-profile-80.png')}}" alt="">
                                </div>
                                <div class="text-center">
                                    <p class="tx-16 fw-bolder">{{--Auth::user()->name--}}</p>
                                    <p class="tx-12 text-muted">{{--Auth::user()->type--}}</p>
                                </div>
                                        </div>
                            <ul class="list-unstyled p-1">
                            <li class="dropdown-item py-2">
                                <a href="{{route('logout')}}" class="text-body ms-0" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>Déconnecter</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                </a>
                            </li>
                            </ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>
    @yield('content')

            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
				<p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="#" target="_blank">MDL TEAM</a>.</p>
			</footer>
			<!-- partial -->

		</div>
	</div>

	<!-- core:js -->
    <script>

        $(document).ready(function(){
        $('#images').drop_uploader({
            uploader_text: 'Drop files to upload, or',
            browse_text: 'Browse',
            only_one_error_text: 'Only one file allowed',
            not_allowed_error_text: 'File type is not allowed',
            big_file_before_error_text: 'Files, bigger than',
            big_file_after_error_text: 'is not allowed',
            allowed_before_error_text: 'Only',
            allowed_after_error_text: 'files allowed',
            browse_css_class: 'button button-primary',
            browse_css_selector: 'file_browse',
            uploader_icon: '',
            file_icon: '',
            progress_color: '#4a90e2',
            time_show_errors: 5,
            layout: 'thumbnails',
            method: 'normal',
            chunk_size: 1000000,
            concurrent_uploads: 5,
            show_percentage: true,
            existing_files: false,
            existing_files_removable: true,
            send_existing_files: false,
            url: 'ajax_upload.php',
            delete_url: 'ajax_delete.php',
        });
    });

    </script>

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

	<!-- End custom js for this page -->



    @stack('order-detail-scripts')
    @stack('order-ticket-scripts')
    @stack('modal-orderline-scripts')
    @stack('select-particular')
    @stack('select-professional')


</body>
</html>
