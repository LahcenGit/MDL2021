@extends('layouts.milkcheck')
@section('content')

<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Bienvenue sur le tableau de board</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
          <span class="input-group-text input-group-addon bg-transparent border-primary"><i data-feather="calendar" class=" text-primary"></i></span>
          <input type="text" class="form-control border-primary bg-transparent">
        </div>
        <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
          <i class="btn-icon-prepend" data-feather="printer"></i>
          Imprimer
        </button>
        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
          <i class="btn-icon-prepend" data-feather="download-cloud"></i>
          Télécharger
        </button>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Déstination Lait</h6>
                 
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    @if($lait->q == 0 )
                    <h3 class="mb-2">0L</h3>
                    @else
                    <h3 class="mb-2">{{$lait->q}}L</h3>
                    @endif
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                        <span>+3.3%</span>
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Déstination Fromage</h6>
                  
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    @if($fromage->qt == 0 )
                    <h3 class="mb-2">0L</h3>
                    @else
                    <h3 class="mb-2">{{$fromage->qt}}L</h3>
                    @endif
                    <div class="d-flex align-items-baseline">
                      <p class="text-danger">
                        <span>-2.8%</span>
                        <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Nombre d'achat</h6>
                  
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$achat}}</h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                        <span>+2.8%</span>
                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                      </p>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Randement Lait Fromage</h6>
                 
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$randement}}Kg</h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-success">
                        <span>+2.8%</span>
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
      <div class="col-4 col-xl-4 grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
            <div>
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4 col-xl-4 grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
            
           
            <div id="chart2" ></div>
          </div>
        </div>
      </div>
      <div class="col-4 col-xl-4 grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
            
           
            <div id="chart3" ></div>
          </div>
        </div>
      </div>
    </div> <!-- row -->
    

     <!-- row -->

    <div class="row">
      <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Top Vendeur</h6>
              
            </div>
            <div class="d-flex flex-column">
              <a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Mohamed Abdellah</h6>
                    <p class="text-muted tx-12">300 L</p>
                  </div>
                  <p class="text-muted tx-13">F=45, D=1500, P=3.5</p>
                </div>
              </a>
              <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Hamza Bounouar</h6>
                    <p class="text-muted tx-12">200L</p>
                  </div>
                  <p class="text-muted tx-13">F=35, D=1300, P=3.2</p>
                </div>
              </a>
              <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Moncef Benammar</h6>
                    <p class="text-muted tx-12">150L</p>
                  </div>
                  <p class="text-muted tx-13">F=32, D=1200, P=3.1</p>
                </div>
              </a>
              <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Houari Mahfoud</h6>
                    <p class="text-muted tx-12">100 L</p>
                  </div>
                  <p class="text-muted tx-13">F=30, D=1050, P=3</p>
                </div>
              </a>
              <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                <div class="me-3">
                  <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <h6 class="text-body mb-2">Lahcene Benmouloud</h6>
                    <p class="text-muted tx-12">90L</p>
                  </div>
                  <p class="text-muted tx-13">F=29, D=1030, P=2.9</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">La table des achats</h6>
            
            <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Vendeur</th>
                      <th>destination</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($achats as $achat)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$achat->vendeur->name}}</td>
                    <td>{{$achat->destination}}</td>
                    <td>{{$achat->created_at}}</td>
                    <td>
                    <a href="#" data-id="{{$achat->id}}" class="btn btn-primary shadow btn-xs sharp mr-1 show-achat" ><i class="mdi mdi-border-color"></i></a>
                    </td>
                  </tr>
                 @endforeach
                  </tbody>
                </table>
               
            </div>
            <div>
              <div class="row">
              <p>voir plus</p>
              <a href="{{url('milkchec/achats')}}"  ><i class="mdi mdi-arrow-right "></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- row -->

</div>
<div id="modal-achat">

</div>
@endsection