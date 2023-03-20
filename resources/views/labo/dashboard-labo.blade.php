@extends('layouts.dashboard-labo')
@section('content')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Bienvenue</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">
            @foreach($resultats as $resultat)
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">{{ $resultat->product->soft_name }} {{ $resultat->product->capacity }}</h6>
                    <div class="dropdown mb-2">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3 col-md-6 col-xl-5">
                      <h3  style="color: #6FB53E;"class="mb-2">{{ $resultat->stock }} </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
      </div>
    </div> <!-- row -->


</div>

@endsection
