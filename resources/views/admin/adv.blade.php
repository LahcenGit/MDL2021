@extends('layouts.dashboard-admin')

@section('content')
<div class="page-content">
<nav class="page-breadcrumb">
   <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Administration ventes</li>
    </ol>
</nav>
@include('flash-message')
<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">Sélectionnez le mois :</label>
        <select class="js-example-basic-single form-select" data-width="100%" id="select-month">
            <option value="1" @if($current_month == 1) selected @endif>Janvier</option>
            <option value="2" @if($current_month == 2) selected @endif>Février</option>
            <option value="3" @if($current_month == 3) selected @endif>Mars</option>
            <option value="4" @if($current_month == 4) selected @endif>Avril</option>
            <option value="5" @if($current_month == 5) selected @endif>Mai</option>
            <option value="6" @if($current_month == 6) selected @endif>Juin</option>
            <option value="7" @if($current_month == 7) selected @endif>Juillet</option>
            <option value="8" @if($current_month == 8) selected @endif>Août</option>
            <option value="9" @if($current_month == 9) selected @endif>Septembre</option>
            <option value="10" @if($current_month == 10) selected @endif>Octobre</option>
            <option value="11" @if($current_month == 11) selected @endif>Novembre</option>
            <option value="12" @if($current_month == 12) selected @endif>Décemebre</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow-1">
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Revenu Total Pro</h6>
                <div class="dropdown mb-2">
                </div>
              </div>
              <div class="row">
                <div class="col-2 col-md-6 col-xl-5">
                    <h5 style="color: #6FB53E;"class="mb-2" id="revenu-pro">{{ number_format($revenu_pro) }} Da</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Revenu Adv</h6>
                  <div class="dropdown mb-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-2 col-md-6 col-xl-5">
                    <h5 style="color: #6FB53E;"class="mb-2">{{ number_format($revenu_pro) }} Da</h5>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Revenu Commercial</h6>
                  <div class="dropdown mb-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-2 col-md-6 col-xl-5">
                    <h5 style="color: #6FB53E;"class="mb-2">{{ number_format($revenu_pro) }} Da</h5>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Revenu Commercial 2</h6>
                  <div class="dropdown mb-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-2 col-md-6 col-xl-5">
                    <h5 style="color: #6FB53E;"class="mb-2">{{ number_format($revenu_pro) }} Da</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Revenu glace  </h6>
                  <div class="dropdown mb-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-2 col-md-6 col-xl-5">
                    <h5 style="color: #6FB53E;"class="mb-2">{{ number_format($totalCategoryOrder) }} Da</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Revenu particulier </h6>
                  <div class="dropdown mb-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-2 col-md-6 col-xl-5">
                    <h5 style="color: #6FB53E;"class="mb-2">{{ number_format($revenu_particular) }} Da</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Total commandes </h6>
                  <div class="dropdown mb-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-2 col-md-6 col-xl-5">
                    <h5 style="color: #6FB53E;"class="mb-2">{{ number_format($nbr_order_pro) }} Da</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Commandes professionnels</h6>
                <p class="text-muted mb-3">Vous trouvez ici  toutes les commandes.</p>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Commande</th>
                            <th>Nom complet</th>
                            <th>Téléphone</th>
                            <th>Wilaya</th>
                            <th>Lancé par </th>
                            <th>Total</th>
                            <th>Statut</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($professional_orders as $professional_order)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$professional_order->code}}</td>
                            <td>{{$professional_order->professional->user->name}}</td>
                            <td>{{$professional_order->professional->phone}}</td>
                            <td>{{$professional_order->professional->wilaya}}</td>
                            @if($professional_order->commercial_id)
                            <td>Commercial</td>
                            @else
                            <td>ADV</td>
                            @endif
                            <td><b>{{number_format($professional_order->total)}}</b> Da</td>
                            @if ($professional_order->status == 1 )
                            <td><span class="badge bg-warning">En attente</span></td>
                            @elseif($professional_order->status == 2)
                            <td><span class="badge bg-primary">Validé</span></td>
                            @elseif($professional_order->status == 3)
                            <td><span class="badge bg-info">Livraison...</span></td>
                            @elseif($professional_order->status == 4)
                            <td><span class="badge bg-success">Livré</span></td>
                            @else
                            <td><span class="badge bg-danger">Annulé</span></td>

                            @endif
                            <td>{{$professional_order->created_at->format('d-m-Y  H:i')}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Commandes particuliers</h6>
                <p class="text-muted mb-3">Vous trouvez ici  toutes les commandes.</p>
                <div class="table-responsive">
                    <table id="dataTableExampletwo" class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Commande</th>
                            <th>Nom complet</th>
                            <th>Téléphone</th>
                            <th>Wilaya</th>
                            <th>Total</th>
                            <th>Statut</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($particulars_orders as $particular_order)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$particular_order->code}}</td>
                            <td>{{$particular_order->particular->user->name}}</td>
                            <td>{{$particular_order->particular->phone}}</td>
                            <td>{{$particular_order->particular->wilaya}}</td>
                            <td><b>{{number_format($particular_order->total)}}</b> Da</td>
                            @if ($particular_order->status == 1 )
                            <td><span class="badge bg-warning">En attente</span></td>
                            @elseif($particular_order->status == 2)
                            <td><span class="badge bg-primary">Validé</span></td>
                            @elseif($particular_order->status == 3)
                            <td><span class="badge bg-success">Livré</span></td>
                            @else
                            <td><span class="badge bg-danger">Annulé</span></td>

                            @endif
                            <td>{{$particular_order->created_at->format('d-m-Y  H:i')}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@push('select-month-script')
<script>
    $(document).ready(function() {
       $('#select-month').change(function() {
        var selectedMonth = $(this).val();
          $.ajax({
                url: '/update-data',
                type: 'GET',
                data: { month: selectedMonth },
                success: function(response) {
                $('#revenu-pro').text(response.revenu_pro);
                $('#revenu-adv').text(response.revenu_adv);
                $('#revenu-commercial').text(response.revenu_commercial);
                $('#revenu-commercial-2').text(response.revenu_commercial_2);
                $('#revenu-particular').text(response.revenu_particular);
                $('#nbr-order-pro').text(response.nbr_order_pro);
                $('#revenu-glace').text(response.nbr_order_pro);
                },
                error: function(xhr, status, error) {

                }
            });
        });
    });
</script>
@endpush
