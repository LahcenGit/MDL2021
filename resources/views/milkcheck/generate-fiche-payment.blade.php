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
                    <h6 class="card-title">Génerer une fiche de paiement</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>

                    <form action="{{asset('milkcheck/generate-fiche-payment')}}" method="POST" >
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
                                <label class="form-label">Mois* :</label>
                                <select class="form-select  select-date" name="date">
                                    <option value="01" >Janvier</option>
                                    <option value="02" >Février</option>
                                    <option value="03" >Mars</option>
                                    <option value="04" >Avril</option>
                                    <option value="05" >Mai</option>
                                    <option value="06" >Juin</option>
                                    <option value="07" >Juillet</option>
                                    <option value="08" >Août</option>
                                    <option value="09" >Septembre</option>
                                    <option value="10" >Octobre</option>
                                    <option value="11" >Novembre</option>
                                    <option value="12" >Décembre</option>

                                </select>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label class="form-label">Année actuelle :</label>
                                <input type="text" class="form-control input-default date" value="2023" name="year" >
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

  $.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
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
