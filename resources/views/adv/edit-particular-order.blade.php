@extends('layouts.dashboard-adv')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier statut</li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{url('adv/particular-orders/'.$order->id)}}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                     @csrf
                     <div id="particular-info">
                        <div class="row mb-3">
                        <div class="col-md-6">
                                <label class="form-label">Client*:</label>
                                <select class="js-example-basic-single form-select" data-width="100%" id="select-professional" name="particular">
                                    <option value="">Le client :</option>
                                    @foreach($particulars as $particular)
                                    <option value="{{ $particular->id }}" @if($order->particular_id == $particular->id)selected @endif>{{ $particular->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label">Produits de la commande:</label>
                        @foreach($orderlines as $product)
                            <div class="col-md-6">

                                <div class="row mb-3">
                                    <div class="col-md-9">
                                     <input type="checkbox" class="form-check-input big-checkbox" id="checkDefault" value="{{ $product->product->id }}" name="products_order[]"checked>
                                        <label class="form-check-label" for="checkDefault">
                                            {{$product->product->soft_name}} {{ $product->product->capacity }}
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control mb-4 mb-md-0 input-default" type="number" min="0" value="{{ $product->qte }}" name="qtes_order[]" />
                                    </div>
                                </div>

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
                                                {{$product->soft_name}} {{ $product->capacity }}
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
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label for="exampleFormControlSelect1" class="form-label">Statut</label>
								<select class="form-select" name="status"  class="form-control input-default " id="exampleFormControlSelect1">
                                    <option>select</option>
                                    <option value="1" @if ($order->status == 1) selected @endif > En attente</option>
                                    <option value="2" @if ($order->status == 2) selected @endif > Validé</option>
                                    <option value="3" @if ($order->status == 3) selected @endif > Livré</option>
                                    <option value="4" @if ($order->status == 4) selected @endif > Annulé</option>
                                </select>

                            </div>
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
