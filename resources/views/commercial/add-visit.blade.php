@extends('layouts.dashboard-commercial')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter une visite </li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" action="{{url('/commercial/visits')}}" enctype="multipart/form-data">
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
                             </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">connaissance du produit*:</label>
                                <select class="js-example-basic-single form-select"  data-width="100%"  name="cp">
                                    <option  disabled selected>selectionner...</option>
                                    <option value="1">oui</option>
                                    <option value="0">non</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                    <label class="form-label">Avis prix*:</label>
                                    <select class="js-example-basic-single form-select"   data-width="100%"  name="price_feedback">
                                        <option  disabled selected>selectionner...</option>
                                        <option value="0">Meilleur prix</option>
                                        <option value="1">Bon prix</option>
                                        <option value="2">Prix elevé</option>
                                    </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                    <label class="form-label">Etat*:</label>
                                    <select class="js-example-basic-single form-select"   data-width="100%"  name="etat">
                                        <option  disabled selected>selectionner...</option>
                                        <option value="0">Demande d'essai</option>
                                        <option value="1">Passé commande</option>
                                        <option value="2">Problème signalé</option>
                                        <option value="3">Refusé</option>
                                    </select>
                                </div>
                        </div>



                        <div class="row mb-3">
                            <div class="col-md-6">
                                    <label class="form-label">Remarque(optionnel):</label>
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


