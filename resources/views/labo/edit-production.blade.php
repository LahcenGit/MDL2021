@extends('layouts.milkcheck')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier une production</li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{url('/milkcheck/productions/'.$production->id)}}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                         @csrf
                         <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Date*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default " type="date" name="date" value="{{$production->created_at->format('Y-m-d')}}"   />

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">Produits*:</label>
                            @foreach($productionlines as $line)
                                <div class="col-md-6">
                                   <div class="row mb-3">
                                        <div class="col-md-9">
                                         <input type="checkbox" class="form-check-input big-checkbox" id="checkDefault" value="{{ $line->product->id }}" name="productlines[]" checked>
                                            <label class="form-check-label" for="checkDefault">
                                            {{$line->product->soft_name}} {{ $line->product->capacity }}
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control mb-4 mb-md-0 input-default" type="text"  value="{{ $line->qte }}" name="production_qtes[]" />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                                            <input class="form-control mb-4 mb-md-0 input-default" type="text"  placeholder="Qte." name="qtes[]" disabled/>
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
@push('check-product')

<script>

    $(".big-checkbox").click(function() {
        var set_disabled =  $(this).is(':checked') ? false : true;
        var set_required=  $(this).is(':checked') ? true : false;
         $(this).parent().next().children('input').attr('disabled',set_disabled).attr("placeholder", "Qte.");
         $(this).parent().next().children('input').attr('required',set_required);
    });

</script>
<script>
    $("#checkDefault").change(function() {
        if(this.checked) {
         $("#add-particular").css("display", "block");
         $("#particular-info").css("display", "none");
    }
    else{
        $("#add-particular").css("display", "none");
        $("#particular-info").css("display", "block");
       }

    });
</script>
@endpush


