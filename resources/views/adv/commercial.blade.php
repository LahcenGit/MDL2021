@extends('layouts.dashboard-adv')
@section('content')
<div class="page-content">
<nav class="page-breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Commandes</li>
</ol>
</nav>
@include('flash-message')
<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow-1">

        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Nombre de visites  </h6>
                <div class="dropdown mb-2">
                </div>
              </div>
              <div class="row">
                <div class="col-3 col-md-6 col-xl-5">
                  <h3  style="color: #6FB53E;"class="mb-2">{{ $nbr_visit }}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">satisfaction prix </h6>
                  <div class="dropdown mb-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-3 col-md-6 col-xl-5">
                    <h3  style="color: #6FB53E;"class="mb-2">{{ number_format($satisfaction_price ,1) }} %</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Connaissance produit  </h6>
                  <div class="dropdown mb-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-3 col-md-6 col-xl-5">
                    <h3  style="color: #6FB53E;"class="mb-2">{{ number_format($cp ,1) }} %</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>
</div>



</div>

@endsection

