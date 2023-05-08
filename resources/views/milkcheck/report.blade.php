@extends('layouts.milkcheck')


@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">rapport</li>
        </ol>
    </nav>


    @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
       Svp ! Corrigez les erreurs suivantes :
       <div class="mb-2"></div>
    <div class="error">
        <ul class="ml-2">
            @foreach ($errors->all() as $error)
                <li style="font-weight:100; ">- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Génerer un rapport</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>

                    <form action="{{asset('milkcheck/report-detail')}}" method="POST" >
                        @csrf
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1" class="form-label">Type *</label>
								<select class="form-select select-type" name="type"  class="form-control input-default  " >
                                    <option value=""></option>
                                   <option value="collector">collecteur</option>
                                   <option value="breeder">eleveur</option>
                               </select>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="exampleFormControlSelect1" class="form-label">Nom *</label>
								<select class="form-select select-collector" name="id"  class="form-control input-default  " >

                               </select>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label class="form-label">Date :</label>
                                <select class="form-select  select-date" name="date">
                                    <option value="m" >Mois Actuel</option>

                                    <option value="p" >Personnalisée</option>
                                </select>
                            </div>


                            <div class="date-section row mt-4 " style="display: none !important">
                                <div class="form-group col-md-3">
                                    <input type="date" class="form-control input-default date" value="{{request()->input('datedebut')}}" name="datedebut" >
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="date" class="form-control input-default date" value="{{request()->input('datefin')}}" name="datefin" >
                                </div>
                            </div>

                        <button style="width: 150;" class=" mt-3 btn btn-primary " type="submit">Générer !</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('report-scripts')

<script>

    if($('.select-date').val() == 'p'){
		$('.date-section').show();
	}
	$('.select-date').on('change', function() {
		if(this.value == 'p'){
			$('.date-section').show();
			$('.date').prop('required',true);
		}
		else{
			$('.date-section').attr('style', 'display: none !important');
			$('.date').prop('required',false);
		}
	});



	$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
	});


    $( ".btn-go" ).click(function() {

        id= $( ".select-collector" ).val();
        window.location.replace('/milkcheck/achats/create/'+ id);


    });

	$( ".select-type" ).change(function() {

        var  type = $(this).val();
        var data= '';
        $.ajax({
			url: '/milkcheck/get-type/' + type,
			type: "GET",

			success: function (lignes) {
                $.each(lignes, function(i, ligne) {
                    data = data + '<option value="'+ ligne.id +'">' +ligne.name+'</option>';

                });
                    $('.select-collector').html("");
                    $('.select-collector').append(data);

		    }
    });
});

</script>

@endpush
