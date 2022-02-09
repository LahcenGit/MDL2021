@extends('layouts.milkcheck')


@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter achat</li>
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
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ajouter Achat  - Première etape</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                       
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1" class="form-label">Collecteur *</label>
								<select class="form-select select-collector" name="collector"  class="form-control input-default  @error('collector') is-invalid @enderror" id="exampleFormControlSelect1" required>
                                    <option value="0">select</option>
                                    @foreach ($collectors as $collector)
                                        <option  value="{{$collector->id}}" @if (old('vendeur') == $collector->id ) selected @endif > {{ $collector->name}}</option>
                                    @endforeach
                                @error('collector')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                               </select>
                               
                            </div>

                            <div class="mt-3 col-md-3">
                                <label class="form-label">Détecteur de validité :</label>
                                <input id="agrement" class="form-control mb-4 mb-md-0 input-default "/>
                                
                            </div>
                        

                        <button style="width: 300px;" class=" mt-3 btn btn-primary btn-go" type="button">Go !</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('select-vendeur-scripts')
    
<script>



	$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
	});


    $( ".btn-go" ).click(function() {

        id= $( ".select-collector" ).val();
        window.location.replace('/milkcheck/achats/create/'+ id);

        
    });

	$( ".select-collector" ).change(function() {
         	

        $( "#agrement" ).removeClass( "is-invalid" );
        $( "#agrement" ).removeClass( "is-valid" );

        var id = $(this).val();
        var d = new Date();
        var data ='';
        //alert(id);
        $.ajax({
			url: '/get-date/' + id,
			type: "GET",

			success: function (res) {
                $( "#agrement" ).val(res);
	          
				if(res > d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate()){
                    $( "#agrement" ).addClass( "is-valid" );
                }
                else{
                    $( "#agrement" ).addClass( "is-invalid" );
                }

			}
		});
});

</script> 


@endpush
@push('input-scripts')
    

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
    


  $('inputF').on('change', function(){
    var v = parseInt(this.value, 100);
    $(this).css('border-color', function(){
        var v = parseInt(this.value,100);
        return isNaN(v) ? '#000' : v < 28 ? '#f00' : v == 28 ? '#0f0' : '#f90';
    });
}).change();
</script>
@endpush