@extends('layouts.dashboard-admin')
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Line chart</h6>
                    <div>
                      <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
          <div class="card">
            <div class="card-body">
                <h4>Top Client</h4>
              <div class="d-flex flex-column">
                @foreach ($professionals as $professional)
                  <a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">
                    <div class="me-3">
                      <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                    </div>
                    <div class="w-100">
                      <div class="d-flex justify-content-between">
                        <h6 class="text-body mb-2 mt-2">{{ $professional->professional->user->name }}</h6>
                        <p class="text-muted tx-12 mt-2">12.30 PM</p>
                      </div>
                      <p class="text-muted tx-13">{{ $professional->total_quantity }} KG</p>
                    </div>
                  </a>
                @endforeach

              </div>
            </div>
          </div>
        </div>

      </div> <!-- row -->
</div>
@endsection
@push('morrisLine-script')
<script>


$.ajax({
      url: '/get-data' ,
      type: "GET",
      async: false,
      success: function (result) {
        var x1 = []; // Tableau pour les premières valeurs (1, 3, 5)
        var x2 = []; // Tableau pour les deuxièmes valeurs (2, 4, 6)

        for (var i = 0; i < result.length; i++) {
            x1.push(data[i][0]); // Ajoute la première valeur dans x1
            x2.push(data[i][1]); // Ajoute la deuxième valeur dans x2
        }

        alert(result[5]);


      }




      


    });



  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: x1,
      datasets: [{
        label: '# of Votes',
        data: x2,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
@endpush
