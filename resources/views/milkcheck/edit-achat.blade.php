@extends('layouts.milkcheck')

<style>
    .price-calculator{
      font-family: 'Orbitron', sans-serif;
      font-size:25px; 
      color:#16B4B7; 
      font-weight : bold;
	  pointer-events: none;
	  height: 50px;
      border: none;
    }
</style>
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier achat </li>
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
                    <h6 class="card-title">Modifier Achat - <span style="color:#6FB53E"> {{$achat->collector->name}}</span> le : {{$achat->created_at->format('d-m-Y')}} </h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                    <form action="{{url('milkcheck/achats/'.$achat->id)}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf

                        <input type="hidden" name="collector" value="{{$achat->collector_id}}">

                        <label for="exampleFormControlSelect1" class="form-label">La liste des eleveurs </label>
                       
                        <div class=" col-lg-8 col-12 mb-3">

                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Validité</th>
                                    <th scope="col">Qte / L</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   @foreach ($lineachats as $lineachat)
                                    <tr>
                                        <th style="width: 10px;">{{$loop->iteration}}</th>
                                        <td >{{$lineachat->breeder->name}}</td>
                                        @if ($lineachat->breeder->check() > 15 )
                                        <td><span class="badge bg-success">Valide</span></td>
                                        @endif
                                        @if ($lineachat->breeder->check() <= 0 )
                                        <td><span class="badge bg-danger">Expiré</span></td>
                                        @endif
                                        @if ($lineachat->breeder->check() < 15 &&  $lineachat->breeder->check()>0)
                                        <td><span class="badge bg-warning">Reste {{$lineachat->breeder->check()}} jours </span></td>
                                        @endif
                                        <td style="width: 200px;"> <input class="form-control  input-default" type="number" name="{{$lineachat->breeder_id.'qte'}}" value="{{$lineachat->qte}}" /></td>
                                    </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            
                        </div>
                      
                     
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1" class="form-label">Déstination</label>
								<select class="form-select" name="destination" class="form-control input-default @error('destination') is-invalid @enderror" id="exampleFormControlSelect1">
                                    <option value="0">select</option>
                                    <option value="fromage" @if ($achat->destination == "fromage") selected @endif>Frommage</option>
                                    <option value="lait" @if ($achat->destination == "lait") selected @endif>Lait</option>
                                    @error('destination')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                                </select>
                               
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1" class="form-label">Date</label>
                                <input class="form-select" value="{{$achat->created_at->format('Y-m-d')}}" name="date" type="date" class="form-control input-default">
                              
                            </div>
                        </div>
                          

                            <div class="row mb-3">
                                <div class="col-md-1">
                                    <label class="form-label">F:</label>
                                    <input class="form-control fat mb-4 mb-md-0 input-default @error('qteF') is-invalid @enderror" value={{$analyse->f}} id="inputF" name="qteF" placeholder="0" />
                                    @error('qteF')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                
                                <div class="col-md-1">
                                    <label class="form-label">D:</label>
                                    <input class="form-control densite mb-4 mb-md-0 input-default @error('qteD') is-invalid @enderror" value="{{$analyse->d}}" id="inputD" name="qteD" placeholder="0" />
                                    @error('qteD')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">C:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteC') is-invalid @enderror" value="{{$analyse->c}}" name="qteC" placeholder="0" />
                                    @error('qteC')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">S:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteS') is-invalid @enderror" value="{{$analyse->s}}" name="qteS" placeholder="0" />
                                    @error('qteS')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                       
                                <div class="col-md-1">
                                    <label class="form-label">P:</label>
                                    <input class="form-control protine mb-4 mb-md-0 input-default @error('qteP') is-invalid @enderror" value="{{$analyse->p}}" name="qteP" placeholder="0" />
                                    @error('qteP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">W:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteW') is-invalid @enderror" value="{{$analyse->w}}" name="qteW" placeholder="0" />
                                    @error('qteW')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">L:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteL') is-invalid @enderror" value="{{$analyse->l}}" name="qteL" placeholder="0" />
                                    @error('qteL')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">T:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteT') is-invalid @enderror"value="{{$analyse->t}}" name="qteT" placeholder="0" />
                                    @error('qteT')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">FP:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteFP') is-invalid @enderror" value="{{$analyse->fp}}" name="qteFP" placeholder="0" />
                                    @error('qteFP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">A:</label>
                                    <input class="form-control mb-4 acidite mb-md-0 input-default @error('qteFP') is-invalid @enderror" value="{{$analyse->a}}" name="qteA" placeholder="0" />
                                    @error('qteA')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                            </div>

                            <button class="btn btn-warning price-action" type="button">Calculer prix d'achat</button>
                            <button class="btn btn-secondary price-reset" type="button">Réinitialiser</button>
                             <br>
                            <input class="price-calculator mt-3" value="{{$achat->price}}" name="price_achat" /> <br>
                        
                        <button class="btn btn-primary" type="submit">Mettre a jour l'achats</button>
                    </form>
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

    $(".price-action").click(function () {

        f =   $( ".fat" ).val();
        p =   $( ".protine" ).val();
        d =   $( ".densite" ).val();
        a =   $( ".acidite" ).val();

        price = 50 ; 

        if (f>28 && p>2.8){
           
            price = price + 2 ; 
        }

        if (d>1028 && a<18){
            price = price + 2 ; 
        }

        $( ".price-calculator" ).val(price);
        
    });


    $(".price-reset").click(function () {

        $( ".price-calculator" ).val(50);
        
    });

	$( ".select-vendeur" ).change(function() {
         	

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
	          
				if(res < d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate()){
                    $( "#agrement" ).addClass( "is-invalid" );
                }
                else{
                    $( "#agrement" ).addClass( "is-valid" );
                }

			}
		});
});

</script> 
@endpush