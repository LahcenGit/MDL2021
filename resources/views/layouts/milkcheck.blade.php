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

	<title>Milkchek - Contrôle laitier et analyse du lait </title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
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
  <link rel="stylesheet" href="{{ asset('/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
  <link rel="shortcut icon" href="{{asset('/assets/zahra-profile.png')}}" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        <a href="{{url('/milkcheck')}}" class="sidebar-brand">
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

          <li class="nav-item nav-category">LPC</li>

          <li class="nav-item  {{ active_class(['milkcheck/lpc/*','milkcheck/lpc']) }}">
            <a class="nav-link"  data-bs-toggle="collapse" href="#lpc" role="button" aria-expanded="{{ is_active_route(['milkcheck/lpc/*','milkcheck/lpc']) }}" aria-controls="lpc">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Gestion LPC</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['milkcheck/lpc/*','milkcheck/lpc']) }} " id="lpc">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('milkcheck/lpc/clients')}}" class="nav-link {{ active_class(['milkcheck/lpc/clients']) }}">clients</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('milkcheck/lpc/productions')}}" class="nav-link {{ active_class(['milkcheck/lpc/productions']) }}">Productions</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('milkcheck/lpc/ventes')}}" class="nav-link {{ active_class(['milkcheck/lpc/ventes']) }}">Ventes</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('milkcheck/lpc/stocks')}}" class="nav-link {{ active_class(['milkcheck/lpc/stocks']) }}">Stock</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('milkcheck/lpc/repport')}}" class="nav-link {{ active_class(['milkcheck/lpc/repport']) }}">Rapports</a>
                </li>
              </ul>
            </div>
          </li>


          <li class="nav-item nav-category">collaborateur</li>

          <li class="nav-item  {{ active_class(['milkcheck/collectors/*','milkcheck/collectors']) }}">
            <a class="nav-link"  data-bs-toggle="collapse" href="#collecteurs" role="button" aria-expanded="{{ is_active_route(['milkcheck/collectors/*','milkcheck/collectors']) }}" aria-controls="collecteurs">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Collecteurs</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['milkcheck/collectors/*','milkcheck/collectors']) }} " id="collecteurs">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('milkcheck/collectors/create')}}" class="nav-link {{ active_class(['milkcheck/collectors/create']) }}">Ajouter</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('milkcheck/collectors')}}" class="nav-link {{ active_class(['milkcheck/collectors']) }}">Liste collecteurs</a>
                </li>
              </ul>
            </div>
          </li>


          <li class="nav-item  {{ active_class(['milkcheck/breeders/*','milkcheck/breeders']) }}">
            <a class="nav-link"  data-bs-toggle="collapse" href="#eleveurs" role="button" aria-expanded="{{ is_active_route(['milkcheck/breeders/*','milkcheck/breeders']) }}" aria-controls="eleveurs">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Eleveurs</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['milkcheck/breeders/*','milkcheck/breeders']) }} " id="eleveurs">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('milkcheck/breeders/create')}}" class="nav-link {{ active_class(['milkcheck/breeders/create']) }}">Ajouter</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('milkcheck/breeders')}}" class="nav-link {{ active_class(['milkcheck/breeders']) }}">Liste eleveurs</a>
                </li>
              </ul>
            </div>
          </li>


          <li class="nav-item {{ active_class(['milkcheck/achats/*','milkcheck/achats']) }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#achats" role="button" aria-expanded="{{ is_active_route(['milkcheck/achats/*','milkcheck/achats']) }}" aria-controls="achats">
              <i class="link-icon" data-feather="shopping-cart"></i>
              <span class="link-title">Achats</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['milkcheck/achats/*','milkcheck/achats']) }}" id="achats">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('milkcheck/achats/create')}}" class="nav-link {{ active_class(['milkcheck/achats/create']) }}">Ajouter</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('milkcheck/achats')}}" class="nav-link {{ active_class(['milkcheck/achats']) }}">Liste achats</a>
                  </li>
              </ul>
            </div>
          </li>

          <li class="nav-item {{ active_class(['milkcheck/agrements/*','milkcheck/agrements']) }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#agrements" role="button" aria-expanded="{{ is_active_route(['milkcheck/agrements/*','milkcheck/agrements']) }}" aria-controls="agrements">
              <i class="link-icon" data-feather="file-text"></i>
              <span class="link-title">Agrements</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['milkcheck/accords/*','milkcheck/accords']) }}" id="agrements">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('milkcheck/accords/collectors')}}" class="nav-link {{ active_class(['milkcheck/accords/collectors']) }}">Collecteurs</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('milkcheck/accords/breeders')}}" class="nav-link {{ active_class(['milkcheck/accords/breeders']) }}">Eleveurs</a>
                </li>


              </ul>
            </div>
          </li>

          <li class="nav-item {{ active_class(['milkcheck/paiements/*','milkcheck/paiements']) }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#paiements" role="button" aria-expanded="{{ is_active_route(['milkcheck/paiements/*','milkcheck/paiements']) }}" aria-controls="paiements">
              <i class="link-icon" data-feather="dollar-sign"></i>
              <span class="link-title">Paiements</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>

            <div class="collapse {{ show_class(['milkcheck/paiements/*','milkcheck/paiements']) }}" id="paiements">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('milkcheck/paiements/etat')}}" class="nav-link {{ active_class(['milkcheck/paiements/etat']) }}">Etat paiement</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link {{ active_class(['milkcheck/paiements/transfer']) }}">Virements</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Transformation lait</li>
          <li class="nav-item {{ active_class(['milkcheck/transformatiob-milk/*','milkcheck/transformatiob-milk']) }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#transformation" role="button" aria-expanded="{{ is_active_route(['milkcheck/transformatiob-milk/*','milkcheck/transformatiob-milk']) }}" aria-controls="transformation">
              <i class="link-icon" data-feather="aperture"></i>
              <span class="link-title">Transformation lait</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>

            <div class="collapse {{ show_class(['milkcheck/transformatiob-milk/*','milkcheck/transformatiob-milk']) }}" id="transformation">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('milkcheck/transformation-milk/create')}}" class="nav-link {{ active_class(['milkcheck/transformation-milk/create']) }}">Ajouter</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('milkcheck/transformation-milk')}}" class="nav-link {{ active_class(['milkcheck/transformation-milk']) }}">Tous</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Fabrication produit</li>
          <li class="nav-item {{ active_class(['milkcheck/product-fabrication/*','milkcheck/product-fabrication']) }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#fabrication" role="button" aria-expanded="{{ is_active_route(['milkcheck/product-fabrication/*','milkcheck/product-fabrication']) }}" aria-controls="fabrication">
              <i class="link-icon" data-feather="star"></i>
              <span class="link-title">Fabrication produit</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>

            <div class="collapse {{ show_class(['milkcheck/product-fabrication/*','milkcheck/product-fabrication']) }}" id="fabrication">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('milkcheck/product-fabrication/create')}}" class="nav-link {{ active_class(['milkcheck/product-fabrication/create']) }}">Crème brute</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('milkcheck/product-fabrication')}}" class="nav-link {{ active_class(['milkcheck/product-fabrication']) }}">Tous</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Productions</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="disc"></i>
              <span class="link-title">Productions</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ asset('milkcheck/productions/create') }}" class="nav-link">Ajouter</a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('milkcheck/productions') }}" class="nav-link">Tous</a>
                </li>

              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Employés</li>

          <li class="nav-item  {{ active_class(['milkcheck/workers/*','milkcheck/workers']) }}">
            <a class="nav-link"  data-bs-toggle="collapse" href="#workers" role="button" aria-expanded="{{ is_active_route(['milkcheck/workers/*','milkcheck/workers']) }}" aria-controls="workers">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Employés</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['milkcheck/workers/*','milkcheck/workers']) }} " id="workers">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('milkcheck/workers/create')}}" class="nav-link {{ active_class(['milkcheck/workers/create']) }}">Ajouter</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('milkcheck/workers')}}" class="nav-link {{ active_class(['milkcheck/workers']) }}">Tous</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('milkcheck/worker-taches/create')}}" class="nav-link {{ active_class(['milkcheck/worker-taches']) }}">Employé taches</a>
                </li>
              </ul>
            </div>
          </li>


          <li class="nav-item  {{ active_class(['milkcheck/taches/*','milkcheck/taches']) }}">
            <a class="nav-link"  data-bs-toggle="collapse" href="#taches" role="button" aria-expanded="{{ is_active_route(['milkcheck/taches/*','milkcheck/taches']) }}" aria-controls="taches">
              <i class="link-icon" data-feather="file-text"></i>
              <span class="link-title">Taches</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['milkcheck/taches/*','milkcheck/taches']) }} " id="taches">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('milkcheck/taches/create')}}" class="nav-link {{ active_class(['milkcheck/taches/create']) }}">Ajouter</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('milkcheck/taches')}}" class="nav-link {{ active_class(['milkcheck/taches']) }}">Toutes</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Rapport</li>
          <li class="nav-item {{ active_class(['milkcheck/report']) }}">
            <a href="{{url('/milkcheck/report')}}" class="nav-link {{ active_class(['milkcheck/report']) }}">
              <i class="link-icon" data-feather="file"></i>
              <span class="link-title">Rapport</span>
            </a>
          </li>

          <li class="nav-item {{ active_class(['milkcheck/generate-fiche-payment']) }}">
            <a href="{{url('/milkcheck/generate-fiche-payment')}}" class="nav-link {{ active_class(['milkcheck/generate-fiche-payment']) }}">
                <i class="link-icon" data-feather="file"></i>
                <span class="link-title">Fiche paiement</span>
              </a>
          </li>

          <li class="nav-item {{ active_class(['milkcheck/generate-fiche-soutien']) }}">
            <a href="{{url('/milkcheck/generate-fiche-soutien')}}" class="nav-link {{ active_class(['milkcheck/generate-fiche-soutien']) }}">
                <i class="link-icon" data-feather="file"></i>
                <span class="link-title">Soutien agricole</span>
            </a>

          </li>
         {{--
          <li class="nav-item nav-category">Setting</li>
          <li class="nav-item {{ active_class(['milkcheck/profil']) }}">
            <a href="{{url('/milkcheck/profil')}}" class="nav-link {{ active_class(['milkcheck/profil']) }}">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Profile</span>
            </a>
          </li>

          <li class="nav-item {{ active_class(['milkcheck/parameters']) }}">
            <a href="{{url('/milkcheck/parameters')}}" class="nav-link {{ active_class(['milkcheck/parameters']) }}">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Paramètres</span>
            </a>
          </li>
        --}}
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
										<p class="tx-16 fw-bolder">{{Auth::user()->name}}</p>
										<p class="tx-12 text-muted">{{Auth::user()->type}}</p>
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

            <!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
				<p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="#" target="_blank">MDL DEV TEAM</a>.</p>
				<p class="text-muted">MilkCheck V1.0 <i class="mb-1 text-zahra ms-1 icon-sm" data-feather="heart"></i></p>
			</footer>
			<!-- partial -->

		</div>
	</div>



	<!-- core:js -->
	<script src="{{asset('/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
  <script src="{{ asset('/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('/assets/js/sweet-alert.js') }}"></script>


  @stack('select-vendeur-scripts')
  @stack('input-scripts')
  @stack('dataf-scripts')
  @stack('datad-scripts')
  @stack('datap-scripts')
  @stack('modal-achat-scripts')
  @stack('report-scripts')
  @stack('report-detail-scripts')
  @stack('achat-ticket-scripts')
  @stack('select-destination-scripts')
  @stack('order-detail-scripts')
  @stack('order-ticket-scripts')
  @stack('modal-orderline-scripts')
  @stack('modal-note-scripts')
  @stack('check-product')
  @stack('modal-productionline-scripts')
  @stack('add-lpc-production')
  @stack('add-stock-init')
  @stack('add-entree')
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
