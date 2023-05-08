@extends('layouts.milkcheck')
@section('content')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Milkcheck</a></li>
            <li class="breadcrumb-item active" aria-current="page">Transformation lait</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Transformation lait</h6>
                    <p class="text-muted mb-3">Qte lait actuellement dans le stock <b>{{$qte}} L</b></p>
                    <form class="forms-sample" method="POST" action="{{url('/milkcheck/transformation-milk')}}" enctype="multipart/form-data">
                      @csrf
                        <div class="row">
                            <div class="mt-3 col-md-2">
                                <label class="form-label">Qte utilisé :</label>
                                <input class="form-control mb-4 mb-md-0 input-default " placeholder="Qte." name="qte_used"/>
                            </div>
                            <div class="mt-3 col-md-2">
                                <label class="form-label ">Déstination :</label>
                                <select class="form-select select-collector" id="destination" name="destination"  class="form-control input-default" id="exampleFormControlSelect1" required>
                                    <option value="lben">Lben</option>
                                    <option value="lait écrémé">Lait écrémé</option>
                                </select>
                            </div>
                            <div class="mt-3 col-md-2">
                                <label class="form-label label">Résultat Lben :</label>
                                <input  class="form-control mb-4 mb-md-0 input-default " name="result"placeholder="Qte."/>
                            </div>
                        </div>
                         <button style="width: 150px;" class=" mt-3 btn btn-primary " type="submit">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('select-destination-scripts')
<script>
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
	});

$( "#destination" ).change(function() {
    var s = $('#destination').val();
    if( s == 'lait écrémé'){
        $(".label").text("Résultat lait écrémé");
    }
    else{
        $(".label").text("Résultat lben");
    }

});

</script>
@endpush
