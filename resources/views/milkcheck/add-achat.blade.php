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
            <li class="breadcrumb-item active" aria-current="page">Ajouter achat</li>
        </ol>
    </nav>



    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ajouter Achat - {{$collector->name}}</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                    <form class="forms-sample" method="POST" action="{{url('/milkcheck/achats')}}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="collector" value="{{$collector->id}}">

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
                                   @foreach ($breeders as $breeder)
                                    <tr>
                                        <th style="width: 10px;">{{$loop->iteration}}</th>
                                        <td >{{$breeder->name}}</td>
                                        @if ($breeder->check() > 15 )
                                        <td><span class="badge bg-success">Valide</span></td>
                                        @endif
                                        @if ($breeder->check() <= 0 )
                                        <td><span class="badge bg-danger">Expiré</span></td>
                                        @endif
                                        @if ($breeder->check() < 15 &&  $breeder->check()>0)
                                        <td><span class="badge bg-warning">Reste {{$breeder->check()}} jours </span></td>
                                        @endif
                                        <td style="width: 200px;"> <input class="form-control  input-default" type="number" name="{{$breeder->id.'qte'}}" value="{{ old($breeder->id.'qte') }}" placeholder="0" required/></td>
                                    </tr>
                                  @endforeach
                                </tbody>
                              </table>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="exampleFormControlSelect1" class="form-label">Déstination *</label>
								<select class="form-select" name="destination" class="form-control input-default @error('destination') is-invalid @enderror" id="exampleFormControlSelect1" required>

                                    <option value="fromage" @if (old('destination') == "fromage") selected @endif>Atelier Frommage</option>
                                    <option value="lait" @if (old('destination') == "lait") selected @endif>Atelier Lait</option>
                                    @error('destination')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                                </select>

                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlSelect1" class="form-label">Date</label>
								<input class="form-select" name="date" value="{{ $date }}" type="date" class="form-control input-default">

                            </div>
                        </div>
                            <div class="row mb-3">
                                <div class="col-md-1">
                                    <label class="form-label">F *:</label>
                                    <input class="form-control fat mb-4 mb-md-0 input-default @error('qteF') is-invalid @enderror" value="{{old('qteF')}}" id="inputF" name="qteF" placeholder="0" required />
                                    @error('qteF')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>

                                <div class="col-md-1">
                                    <label class="form-label">D *:</label>
                                    <input class="form-control densite mb-4 mb-md-0 input-default @error('qteD') is-invalid @enderror" value="{{old('qteD')}}" id="inputD" name="qteD" placeholder="0" required/>
                                    @error('qteD')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">C *:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteC') is-invalid @enderror" value="{{old('qteC')}}" name="qteC" placeholder="0" required/>
                                    @error('qteC')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">S *:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteS') is-invalid @enderror" value="{{old('qteS')}}" name="qteS" placeholder="0" required/>
                                    @error('qteS')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">P *:</label>
                                    <input class="form-control protine mb-4 mb-md-0 input-default @error('qteP') is-invalid @enderror" value="{{old('qteP')}}" name="qteP" placeholder="0" required/>
                                    @error('qteP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>

                                <div class="col-md-1">
                                    <label class="form-label">W *:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteW') is-invalid @enderror" value="{{old('qteW')}}" name="qteW" placeholder="0" required />
                                    @error('qteW')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">L *:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteL') is-invalid @enderror" value="{{old('qteL')}}" name="qteL" placeholder="0" required/>
                                    @error('qteL')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">T *:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteT') is-invalid @enderror"value="{{old('qteT')}}" name="qteT" placeholder="0" required />
                                    @error('qteT')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">FP *:</label>
                                    <input class="form-control mb-4 mb-md-0 input-default @error('qteFP') is-invalid @enderror" value="{{old('qteFP')}}" name="qteFP" placeholder="0" required />
                                    @error('qteFP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>

                                <div class="col-md-1">
                                    <label class="form-label">Acidité *:</label>
                                    <input class="form-control acidite mb-4 mb-md-0 input-default @error('qteA') is-invalid @enderror" value="{{old('qteA')}}" name="qteA" placeholder="0" required />
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
                             <div class="row mb-3">
                                <div class="col-md-3">
                                    <input class="price-calculator mt-3 @error('price_achat') is-invalid @enderror"  name="price_achat"  /> <br>
                                        @error('price_achat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                             </div>
                            <button id="achat-submit" class="btn btn-primary mt-3" type="submit">Ajouter l'achat</button>
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

        price = 70 ;

        $( ".price-calculator" ).val(price);

        if (f>=28 && p>=2.8){

            $( ".price-calculator" ).val(72);
        }

        if (d>=1028 && a<=19){
            $( ".price-calculator" ).val(72);
        }


    });


    $(".price-reset").click(function () {

        $( ".price-calculator" ).val(70);

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
