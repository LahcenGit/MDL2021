@extends('layouts.dashboard-commercial')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter une commande pour professionnels</li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" action="{{url('/commercial/ice-cream-orders')}}" enctype="multipart/form-data">
                        @csrf
                        <div id="particular-info">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Client*:</label>
                                    <select class="js-example-basic-single form-select"   data-width="100%" id="select-professional" name="professional">
                                        <option  disabled selected>selectionner...</option>
                                        @foreach($professionals as $professional)
                                        <option value="{{ $professional->id }}">{{ $professional->user->name }} - {{ $professional->type }}</option>
                                        @endforeach
                                    </select>
                                 </div>
                                 <div class="col-md-3 mt-2">
                                    <label>Date:</label>
                                    <input type="date" class="form-control input-default"  name="date" value="{{ $date }}" >
                                 </div>
                                 <div class="col-md-3 mt-4">
                                    <input type="checkbox" class="form-check-input check-pack" id="check-pack" name="check_price" value="1">
                                        <label class="form-check-label" for="check-pack">
                                          <span style="color:#6FB53E"> <b>PRIX GROS</b></span>
                                        </label>
                                </div>
                             </div>
                        </div>

                        <div id="product" >
                            <div class="row mb-3">
                                <label class="form-label">Produits*:</label>
                                @foreach($products->split($products->count()/2) as $row)
                                    <div class="col-md-6">
                                        @foreach ($row as $product)
                                        <div class="row mb-3">
                                            <div class="col-md-9">
                                            <input type="checkbox" class="form-check-input big-checkbox" id="checkDefault" value="{{ $product->id }}" name="products[]">
                                                <label class="form-check-label" for="checkDefault">
                                                {{$product->soft_name}}
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
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Remarque:</label>
                                <textarea class="form-control mb-4 mb-md-0  input-default " name="note" value="{{old('note')}}" placeholder="remarque...." ></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Ajouter</button>
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

