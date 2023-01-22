@extends('layouts.front')
@section('content')


<div class="container">
  <form class="form-horizontal checkout" role="form">
       <div id="title-bg">
            <div class="title">Confirm Order</div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered chart">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Type Emb</th>
                        <th>DLC</th>
                        <th>qte</th>
                        <th>PU HT</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->cartlines as $cartline)
                    <tr>
                        <td>{{ $cartline->product->designation }}</td>
                        <td>{{ $cartline->product->type_emb }}</td>
                        <td>{{ $cartline->product->dlc }}</td>
                        <td>{{ $cartline->qte }}</td>
                        <td>{{ $cartline->product->pu_ht }}</td>
                        <td>{{ number_format($cartline->total) }} Da</td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-3 col-md-offset-9">
            <div class="subtotal-wrap">
                <div class="subtotal">
                    <p>Sub Total : $26.00</p>
                    <p>Vat 17% : $54.00</p>
                </div>
                <div class="total">Total : <span class="bigprice">$255.00</span></div>
                <button class="btn btn-default btn-red btn-sm">Order Now</button>
            </div>
            <div class="clearfix"></div>
            </div>
        </div>
    </form>
    <div class="spacer"></div>
</div>
@endsection
