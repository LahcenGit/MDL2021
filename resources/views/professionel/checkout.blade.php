@extends('layouts.front')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; Confirmation</div>
                        <div class="bigtitle" style="color:#1847AD">Confirmation de la commande</div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <ul class="small-menu"><!--small-nav -->
            <li><a href="{{ asset('/app-professional') }}"  class="myshop">Mes commandes</a></li>
            <li><a href="{{ asset('app-professional/profil') }}" class="myacc">Mon profil</a></li>
            <li><a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"  class="sign-out">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul><!--small-nav -->
        <div class="clearfix"></div>
        <div class="lines"></div>
    </div>

  <form class="form-horizontal checkout" role="form">

        <h5>Merci de bien vérifier les détails de votre commande</h5>

        <div class="table-responsive">
            <table class="table table-bordered chart">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Type Emb</th>
                        <th>DLC</th>
                        <th>qte</th>
                        <th>P.U </th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->cartlines as $cartline)
                    <tr>
                        <td>{{ $cartline->product->designation }} {{ $cartline->product->capacity }}</td>
                        <td>{{ $cartline->product->type_emb }}</td>
                        <td>{{ $cartline->product->dlc }}</td>
                        <td>{{ $cartline->qte }}</td>
                        <td>{{ $cartline->pu }}</td>
                        <td>{{ number_format($cartline->total) }} Da</td>
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
                <a href="{{ url('app-professional/success-order') }}"class="btn btn-default btn-red btn-lg">Commander</a>
            </div>
            <div class="clearfix"></div>
            </div>
        </div>
    </form>
    <div class="spacer"></div>
</div>
@endsection
