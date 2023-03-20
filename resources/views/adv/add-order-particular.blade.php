@extends('layouts.dashboard-adv')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter une commande pour particulier</li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" action="{{url('adv/add-order-particular')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-9">
                             <input type="checkbox" class="form-check-input big-checkbox" id="checkDefault" name="check" value="1">
                                <label class="form-check-label" for="checkDefault">
                                Nouveau Client ?
                                </label>
                            </div>
                        </div>
                        <div id="add-particular" style="display: none">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nom complet*:</label>
                                    <input class="form-control mb-4 mb-md-0  input-default " name="name"  value="{{old('name')}}" placeholder="name"  />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Téléphone*:</label>
                                    <input class="form-control mb-4 mb-md-0  input-default " name="new_phone"  value="{{old('name')}}" placeholder="name"  />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Wilaya:</label>
                                    <select class="form-select" name="new_wilaya"  class="form-control input-default " id="exampleFormControlSelect1" >
                                        <option value="" disabled selected>La wilaya: </option>
                                        @foreach($wilayas as $wilaya)
                                        <option value="{{ $wilaya->name }}" @if(old('wilaya') == $wilaya->name) selected @endif>{{ $wilaya->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Adresse:</label>
                                    <input class="form-control mb-4 mb-md-0  input-default " name="new_address"  value="{{old('address')}}" placeholder="adresse" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Email*:</label>
                                    <input class="form-control mb-4 mb-md-0  input-default " name="email"  value="{{old('email')}}" placeholder="email"  />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Mot de passe*:</label>
                                    <input type="password" class="form-control mb-4 mb-md-0  input-default " name="password"  placeholder="mot de passe"  />
                                </div>
                            </div>
                        </div>
                        <div id="particular-info">
                            <div class="row mb-3">
                            <div class="col-md-6">
                                    <label class="form-label">Client*:</label>
                                    <select class="js-example-basic-single form-select" data-width="100%" id="select-particular" name="particular">
                                        <option value="">Le client :</option>
                                        @foreach($particulars as $particular)
                                        <option value="{{ $particular->id }}">{{ $particular->user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Téléphone*:</label>
                                    <input class="form-control mb-4 mb-md-0  input-default " name="phone" id="phone" value="{{old('phone')}}" placeholder="telephone"  />
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Adresse*:</label>
                                    <input class="form-control mb-4 mb-md-0  input-default @error('address') is-invalid @enderror" id="address" name="address" value="{{old('address')}}" placeholder="adresse"  />
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Wilaya:</label>
                                    <select class="form-select" name="wilaya"  class="form-control input-default " id="exampleFormControlSelect1" >
                                        <option value="" disabled selected>La wilaya: </option>
                                        <option value="Alger" @if(old('wilaya')== 'Alger') selected @endif>Alger</option>
                                        <option value="Oran" @if(old('wilaya')== 'Oran') selected @endif>Oran</option>
                                        <option value="Aïn Témouchent" @if(old('wilaya')== 'Aïn Témouchent') selected @endif>Aïn Témouchent</option>
                                        <option value="Sidi Bel Abbès" @if(old('wilaya')== 'Sidi Bel Abbès') selected @endif>Sidi Bel Abbès</option>
                                    </select>
                                </div>
                            </div>
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
                        <button class="btn btn-primary" type="submit">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('select-particular')
<script>
    $( "#select-particular" ).change(function() {
        var id =  $("#select-particular").val();

        $.ajax({
        url: '/get-phone/'+id,
        type: "GET",
        success: function (res) {
        $("#phone").val(res.phone);
        $("#address").val(res.adresse);
        }
      });
      });
</script>
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


