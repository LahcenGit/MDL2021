@extends('layouts.dashboard-admin')

@section('content')
 
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
          <span class="input-group-text input-group-addon bg-transparent border-primary"><i data-feather="calendar" class=" text-primary"></i></span>
          <input type="text" class="form-control border-primary bg-transparent">
        </div>
        <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
          <i class="btn-icon-prepend" data-feather="printer"></i>
          Print
        </button>
        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
          <i class="btn-icon-prepend" data-feather="download-cloud"></i>
          Download Report
        </button>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Commandes globales</h6>
               
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$order}}</h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                        <span>0%</span>
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Commandes en attentes</h6>
               
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$pendingorder}}</h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-danger">
                        <span>0%</span>
                        <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Gain</h6>
                 
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$gain->total}} DA</h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                        <span>0%</span>
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- row -->

    

    

    <div class="row">
      
      <div class="col-lg-7 col-xl-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Les dix dernières commandes</h6>
              
            </div>
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th class="pt-0">#</th>
                   
                    <th>Nom</th>
                    <th>wilaya</th>
                    <th>Téléphone</th>
                    <th>Pack</th>
                    <th>Total</th>
                    <th>Statut</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->wilaya}}</td>
                    <td>{{$order->phone}}</td>
                    <td><b> {{$order->pack}} </b></td>
                    <td> <b class="text-primary"> {{$order->total}} Da </b></td>
        
                    @if ($order->statut == 1 )
                    <td><span class="badge bg-warning">En cours</span></td>
                    @elseif($order->statut == 2)
                    <td><span class="badge bg-success">Terminé</span></td>
                    @else
                    <td><span class="badge bg-danger">Annulé</span></td>
                    
                    @endif
        
                    <td>{{$order->created_at->format('d-m-Y  H:i')}}</td>
                  </tr>
                  @endforeach        
                </tbody>
              </table>
            </div>
          </div> 
        </div>
      </div>
    </div> <!-- row -->

        </div>
@endsection