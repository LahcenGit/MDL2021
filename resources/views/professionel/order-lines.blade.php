@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bread"><a href="#">Accueil</a> &rsaquo; dashboard</div>
                        <div class="bigtitle">Tableau de board</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <ul class="small-menu"><!--small-nav -->
            <li><a href=""  class="myshop">Mes commandes</a></li>
            <li><a href="" class="myacc">Mon profil</a></li>
            <li><a href=""  class="sign-out">Déconnexion</a></li>
        </ul><!--small-nav -->
        <div class="clearfix"></div>
        <div class="lines"></div>
    </div>

    <div id="title-bg">
        <div class="title">Détail commande</div>

    </div>

    <div class="row" style="text-align: center;">
        <a href="{{ url('/order-professional') }}"class="btn btn-default btn-green " style="font-size: 15px;">Lancez une commande </a>
    </div>

    <div class="table-responsive " style="margin-top: 10px;" >
        <table class="table table-bordered chart" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produit</th>
                    <th>DLC</th>
                    <th>Type Emb</th>
                    <th>Qte</th>
                    <th>P.U</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderlines as $orderline)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$orderline->product->designation}} {{$orderline->product->capacity  }}</td>
                    <td>{{ $orderline->product->dlc }}</td>
                    <td>{{ $orderline->product->type_emb }}</td>
                    <td>{{ $orderline->qte }}</td>
                    <td>{{ $orderline->pu }}</td>
                    <td>{{ number_format($orderline->total) }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-9">
        <div class="subtotal-wrap">
            @if($sub_total )
            <div class="subtotal">
                <p>Total : {{ number_format($sub_total,2) }} Da</p>
                <p>TVA 19% : {{ number_format($tva,2) }} Da</p>
            </div>
            @endif
            <div class="total">Total : <span class="bigprice">{{ number_format($total,2) }} Da</span></div>

        </div>
        <div class="clearfix"></div>
        </div>
    </div>

    <div class="spacer"></div>
</div>




@endsection

@push('script-app')
<script>

</script>
@endpush
