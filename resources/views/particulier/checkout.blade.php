@extends('layouts.front')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="bread"><a href="#">Accuiel</a> &rsaquo; Validation</div>
                        <div class="bigtitle">Validation</div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>

    <form class="form-horizontal checkout" role="form" method="POST" action="{{ url('/app-particular/success-order') }}">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div id="title-bg">
                    <div class="title">Confirmation de la commande</div>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group dob">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" placeholder="Adresse" name="address" required>
                        </div>
                        <div class="col-sm-6">
                           <select class="form-control @error('wilaya') is-invalid @enderror" name="wilaya" placeholder="Wilaya" required>
                                <option>Wilaya</option>
                                <option value="Alger" @if(old('wilaya')== 'Alger') selected @endif>Alger</option>
                                <option value="Oran" @if(old('wilaya')== 'Oran') selected @endif>Oran</option>
                                <option value="Aïn Témouchent" @if(old('wilaya')== 'Aïn Témouchent') selected @endif>Aïn Témouchent</option>
                                <option value="Sidi Bel Abbès" @if(old('wilaya')== 'Sidi Bel Abbès') selected @endif>Sidi Bel Abbès</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group dob">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" value="{{ Auth::user()->particular->phone }}" name="phone">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email" value="{{ Auth::user()->email }}" name="phone">
                        </div>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-bordered chart">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>qte</th>
                                <th>P.U </th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart->cartlines as $cartline)
                            <tr>
                                <td>{{ $cartline->product->designation }} {{ $cartline->product->capacity }}</td>
                                <td>{{ $cartline->qte }}</td>
                                <td>{{ $cartline->pu }}</td>
                                <td>{{ number_format($cartline->total) }} Da</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                        <div class="subtotal-wrap">
                        <div class="total">Total : <span class="bigprice">{{ number_format($total,2) }} Da</span></div>
                        </div>
                        <div class="clearfix"></div>
                        </div>
                    </div>
            </div>
        </div>
        <div id="title-bg">
            <div class="title">Remarque</div>
        </div>
        <p>Remarques sur la commande, par exemple les instructions de livraison.</p>
        <div class="form-group ">
            <div class="col-sm-12">
                <textarea class="form-control" name="note"></textarea>
            </div>
        </div>
        <div class="checkbox">
            <label>
              <input type="checkbox">  J'ai lu et j'accepte les termes et conditions
            </label>
        </div>
        <div class="row d-flex justify-content-center">
            <div id="title-bg">
            </div>

            <div style="margin-bottom: 10px;">
                <span >Cliquez-ici pour valider votre commande. </span>
            </div>
            <div>
                 <button type="submit" class="btn btn-default btn-red">Commander</button></a>
            </div>

        </div>

    </form>
    <div class="spacer"></div>
</div>
@endsection