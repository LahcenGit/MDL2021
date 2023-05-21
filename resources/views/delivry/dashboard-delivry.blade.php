@extends('layouts.dashboard-delivry')
@section('content')



<div class="row d-flex justify-content-center align-items-center mt-4" >

  <div class="col-lg-8">
    <div class="card">
      <div class="card-body">

        <div class="d-flex justify-content-between align-items-baseline mb-2">
          <h6 class="card-title mb-0">Dashboard Livreur : {{Auth::user()->name}}</h6><br>

          <a href="{{route('logout')}}" class="btn btn-danger text-body ms-0 " onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="me-2 icon-md"  style="color:#fff" data-feather="log-out"></i>
                                <span  style="color:#fff">Déconnecter</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                </a>

       </div>

        <div class="table-responsive mt-3">
          <table  class="table">
            <thead>
              <tr>
                <th>Client</th>
                <th>Montant</th>
                <th>Statut</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              <tr>
                <td>{{ $order->professionalOrder->professional->user->name }}</td>
                <td>{{ $order->professionalOrder->total }} Da</td>
                @if($order->status == 0)
                <td>
                   <span class="badge bg-warning text-dark">Non livrée</span>
                </td>
                @else
                <td>
                  <span class="badge bg-success">Livrée</span>
                </td> 
                @endif
                
                <td>
                <a class="pin-map btn btn-primary" data-id="{{$order->professionalOrder->professional->id}}" target="_blank" style="margin-right: 3px;"><i data-feather="map-pin"></i></a>
                @if($order->status == 0)
                <a class="delevery-confirm btn btn-warning" href="{{asset('confirm-delivery/'.$order->id)}}" onclick="return confirm('Voulez-vous vraiment exécuter cette action ?')"  style="margin-right: 3px;"><i data-feather="box"></i></a>
                @endif

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</div>

<div id="loading-overlay" style="display: none;">
  <div id="loading-spinner"></div>
</div>


@endsection


@push('deliver-position-script')

<script>



 
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(".pin-map").click(function() {
      if (navigator.geolocation) {

          var id = $(this).data('id');
          navigator.geolocation.getCurrentPosition(function(position) {
              var latitude = position.coords.latitude;
              var longitude = position.coords.longitude;

              $.ajax({
                url: '/tracking-professional/' + id + '/'+ latitude +'/' + longitude,
                type: "GET",
                success: function (res) {

                  $('#loading-overlay').fadeIn();

                  // Redirect to a new page after a delay (in milliseconds)
                  setTimeout(function() {
                    $('#loading-overlay').fadeOut();
                    window.open(res, "_blank");
                  }, 3000); // Redirect after 3 seconds
                  
                }
             });

          });

      } 
      
      else {
          alert('La géolocalisation n\'est pas prise en charge par ce navigateur.');
      }

     

  });

</script>
@endpush