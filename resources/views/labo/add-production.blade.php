@extends('layouts.dashboard-labo')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter une production</li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" action="{{url('/labo/productions')}}" enctype="multipart/form-data">
                        @csrf
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
                        <button class="btn btn-primary" type="submit">Ajouter</button>
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
         $(this).parent().next().children('input').attr('disabled',set_disabled);
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


