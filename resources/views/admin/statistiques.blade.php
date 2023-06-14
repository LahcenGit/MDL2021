@extends('layouts.dashboard-admin')
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Line chart</h6>
                    <div id="morrisLine"></div>
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
        var data = [];
        var xLabels = [];
        for (var month in result) {
        data.push({
          y: month,
          a: result[month]
        });
      }
        config = {
                data: data,
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Total Quantité'],
                parseTime: true,
                xLabelFormat: function(x) {
                return getMonthName(x.x);
                },

                fillOpacity: 0.6,
                hideHover: 'auto',
                behaveLikeLine: true,
                resize: true,
                pointFillColors:['#ffffff'],
                pointStrokeColors: ['black'],
                lineColors:['red']
        };

        config.element = 'morrisLine';
        Morris.Line(config);
        Morris.Donut({
        element: 'pie-chart',
        data: [
            {label: "Friends", value: 30},
            {label: "Allies", value: 15},
            {label: "Enemies", value: 45},
            {label: "Neutral", value: 10}
          ]
        });
}
});
function getMonthName(month) {
  var monthNames = [
    'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
    'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
  ];

  return monthNames[month - 1] || '';
}

</script>
@endpush
