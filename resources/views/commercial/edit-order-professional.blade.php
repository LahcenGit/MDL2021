@extends('layouts.dashboard-commercial')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Commande mdl-23-3</li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" action="{{url('/commercial/order-professionals')}}" enctype="multipart/form-data">
                        @csrf
                        <div id="particular-info">
                            <div class="row mb-3">
                            <div class="col-md-6">
                                    <label class="form-label">Client*:</label>
                                    <select class="js-example-basic-single form-select" data-width="100%" id="select-professional" name="professional">
                                        <option value="">Le client :</option>
                                        @foreach($professionals as $professional)
                                        <option value="{{ $professional->id }}" @if($order->professional_id == $professional->id)selected @endif>{{ $professional->user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                             </div>
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">Produits de la commande:</label>
                            @foreach($orderlines->split($orderlines->count()/2) as $row)
                                <div class="col-md-6">
                                    @foreach ($row as $product)
                                    <div class="row mb-3">
                                        <div class="col-md-9">
                                         <input type="checkbox" class="form-check-input big-checkbox" id="checkDefault" value="{{ $product->product->id }}" name="products[]">
                                            <label class="form-check-label" for="checkDefault">
                                            {{$product->product->designation}}
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control mb-4 mb-md-0 input-default" type="number" min="0" value="{{ $product->qte }}" name="qtes[]" />
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">Produits*:</label>
                            @foreach($products->split($products->count()/2) as $row)
                                <div class="col-md-6">
                                    @foreach ($row as $product)
                                    <div class="row mb-3">
                                        <div class="col-md-9">
                                         <input type="checkbox" class="form-check-input big-checkbox" id="checkDefault" value="{{ $product->id }}" name="products[]">
                                            <label class="form-check-label" for="checkDefault">
                                            {{$product->designation}}
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control mb-4 mb-md-0 input-default" type="number" min="0" placeholder="Qte." name="qtes[]" disabled/>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('select-professional')

<script>

    $(".big-checkbox").click(function() {
        var set_disabled =  $(this).is(':checked') ? false : true;
        var set_required=  $(this).is(':checked') ? true : false;
         $(this).parent().next().children('input').attr('disabled',set_disabled);
         $(this).parent().next().children('input').attr('required',set_required);
    });

</script>

@endpush


