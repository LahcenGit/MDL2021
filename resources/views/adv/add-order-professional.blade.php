@extends('layouts.dashboard-adv')
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
                  <form class="forms-sample" method="POST" action="{{url('/adv/professional-orders')}}" enctype="multipart/form-data">
                        @csrf
                       <div id="professional-info">
                            <div class="row mb-3">
                            <div class="col-md-6">
                                    <label class="form-label">Client*:</label>
                                    <select class="js-example-basic-single form-select" data-width="100%" id="select-professional" name="professional">
                                        <option value="">Le client :</option>
                                        @foreach($professionals as $professional)
                                        <option value="{{ $professional->id }}">{{ $professional->user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                             </div>
                        </div>
                        <div id="pack" style="display:none;">
                            <div class="row mb-3">
                                <div class="col-md-9">
                                <input type="checkbox" class="form-check-input check-pack" id="check-pack" name="check_pack" value="1">
                                    <label class="form-check-label" for="check-pack">
                                    pack supérette
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
                                                    {{$product->soft_name}} {{$product->capacity}}
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
<script>
    $("#checkDefault").change(function() {
        if(this.checked) {
         $("#add-professional").css("display", "block");
         $("#professional-info").css("display", "none");
    }
    else{
        $("#add-professional").css("display", "none");
        $("#professional-info").css("display", "block");
       }

    });
</script>
<script>
    $("#select-professional").change(function() {
        var id =  $("#select-professional").val();
        $.ajax({
                url: '/get-type/'+id,
                type: "GET",
                success: function (res) {
                if(res.type == 'Superette'){
                 $("#pack").css("display", "block");
                 $("#check-pack").change(function() {
                if(this.checked) {
                    $("#product").css("display", "none");

                }
                else{
                    $("#product").css("display", "block");
                }

                });

                }
            }
        });

    });
</script>
<script>
    $("#select-type").change(function() {
        var type =  $("#select-type").val();
        if(type == 'Superette'){
         $("#pack").css("display", "block");
          $("#check-pack").change(function() {
            if(this.checked) {
                $("#product").css("display", "none");
            }
            else{
                $("#product").css("display", "block");
            }
        });
       }
       else{
        $("#pack").css("display", "none");
       }


    });
</script>
@endpush


