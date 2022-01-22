@extends('layouts.milkcheck')
@section('content')

<style>
  .text-zahra{
    color: #6FB53E;
  }
</style>

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
          <div class="col-md-3 col-6 grid-margin stretch-card">
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
                      <p class="text-zahra">
                        <span>Mois actuel</span>
                      </p>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6 grid-margin stretch-card">
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
                      <p class="text-zahra">
                        <span>Mois actuel</span>
                      </p>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 col-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Nombre d'achat</h6>
                  
                </div>
                <div class="row">
                  <div class="col-6 col-xs-12 col-xl-5">
                    <h3 class="mb-2">{{$achat}}</h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-zahra">
                        <span>Mois actuel</span>
                      </p>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Randement Lait Fromage</h6>
                 
                </div>
                <div class="row">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2">{{$randement}}Kg</h3>
                    <div class="d-flex align-items-baseline">
                      <p class="text-zahra">
                        <span>Mois actuel</span>
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
      <div class="col-lg-4 grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
            <div>
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4  grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
            
           
            <div>
              <canvas id="myChart2"></canvas>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4  grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
            
           
            <div>
              <canvas id="myChart3"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- row -->
    

     <!-- row -->

    <div class="row">
      <div class="col-lg-8 col-xl-6 grid-margin grid-margin-xl-0 stretch-card">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title mb-0">Top eleveur Qualité</h6>
          </div>
          <div class="card-body">

            <table class="table table-striped">
              <tbody>
                @foreach($top_breeders as $top_breeder)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td><h6 class="text-body mb-2">{{$top_breeder->breeder->name}}</h6>
                     <p class="text-muted tx-13">F={{$top_breeder->fat}}, D={{$top_breeder->densite}}, P={{$top_breeder->p}}</p>
                  </td>
                  <td><p class="text-muted tx-12">{{$top_breeder->qte}} L</p></td>
                </tr>
                @endforeach
             
              </tbody>
            </table>
         
            
          </div>
        </div>
      </div>

      <div class="col-lg-8 col-xl-6 grid-margin grid-margin-xl-0 stretch-card">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title mb-0">Top eleveur Quantité</h6>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <tbody>
                @foreach($top_qte_breeders as $top_qte_breeder)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td><h6 class="text-body mb-2">{{$top_qte_breeder->breeder->name}}</h6></td>
                  <td><p class="text-muted tx-12">{{$top_qte_breeder->qte}} L</p></td>
                </tr>
                @endforeach
             
              </tbody>
            </table>
    
          </div>
        </div>
      </div>
      
    </div> <!-- row -->


    {{--<div class="row">
      <div class="col-md-12 mt-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">La table des achats</h6>
            
            <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>eleveur</th>
                      <th>destination</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($achats as $achat)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$achat->eleveur->name}}</td>
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
              <a href="{{url('milkcheck/achats')}}"  ><i class="mdi mdi-arrow-right "></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>--}}

</div>
<div id="modal-achat">

</div>
@endsection

@push('dataf-scripts')
<script>

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var date = [];
  var fat = [];

  $.ajax({
      url: '/data-f' ,
      type: "GET",
      async: false,
      success: function (result) {
        $.each(result, function(i, item) {
            date[i] = item.date ;
            fat[i] = item.fat ;
        });


              const data = {
              labels: date,
              datasets: [{
                label: 'Fat moyenne',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: fat,
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
     
      }
  });

</script>
@endpush

@push('datad-scripts')
<script>

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var date = [];
  var d = [];

  $.ajax({
      url: '/data-d' ,
      type: "GET",
      async: false,
      success: function (result) {
        $.each(result, function(i, item) {
            date[i] = item.date ;
            d[i] = item.densite ;
        });


              const data = {
              labels: date,
              datasets: [{
                label: 'Densité (degré dornic)',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: d,
              }]
              };

              const config = {
              type: 'line',
              data,
              options: {}
              };
            
            var myChart = new Chart(
              document.getElementById('myChart2'),
              config
            );
     
      }
  });

</script>
@endpush

@push('datap-scripts')
<script>

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var date = [];
  var p = [];

  $.ajax({
      url: '/data-p' ,
      type: "GET",
      async: false,
      success: function (result) {
        $.each(result, function(i, item) {
            date[i] = item.date ;
            p[i] = item.p ;
        });


              const data = {
              labels: date,
              datasets: [{
                label: 'Protéine (g/l)',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: p,
           }]
              };

              const config = {
              type: 'line',
              data,
              options: {}
              };
            
            var myChart = new Chart(
              document.getElementById('myChart3'),
              config
            );
     
      }
  });

</script>
@endpush

@push('modal-achat-scripts')
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
@endpush