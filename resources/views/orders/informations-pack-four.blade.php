@extends('layouts.order')

<style>

.title-pack{
    font-size: 30px;
    display: block;
}
</style>
@section('content')


<div class="card">
<div class="card-body">
<h4 class="text-center mb-3 mt-4"> <span style="color: #6FB53E">Etape 3/3 : </span> Remplir vos informations  </h4>
<p class="text-muted text-center mb-4 pb-2">Veuillez indiquer ci-dessous les informations nécessaires pour la livraison</p>

<form action="{{asset('/orders')}}" method="post">
    @csrf

    <input type="hidden" name="pack" value="{{$pack}}">
    <input type="hidden" id="inp-total" name="total" value="2500">
    <input type="hidden" id="inp-added" name="added" >
    <input type="hidden" name="option1" value="{{$option1}}">
    <input type="hidden" name="option2" value="{{$option2}}">
    <input type="hidden" name="option3" value="{{$option3}}">
    <input type="hidden" name="option4" value="{{$option4}}">
    <div class="container" style="margin-top: 50px;">  
        <div class="row">
            <div class="col-md-8 mt-2">

                <div class="col-md-10" >
                    <label class="form-label">Nom complet* (obligatoire):</label>
                    <input class="form-control input-default"   name="name" placeholder="eg. Mohammed Yebedri" required/>
                </div>

                <div class="col-md-10 mt-3">
                    <label class="form-label">Téléphone* (obligatoire):</label>
                    <input class="form-control input-default"   name="phone" placeholder="eg. 0770002211" required />
                </div>
                <div class="col-md-10 mt-3">
                    <label class="form-label">Email (optionnel):</label>
                    <input class="form-control input-default"   name="email" placeholder="eg. email@email.com" required />
                </div>

                <div class="col-md-10 mt-3">
                    <label class="form-label">Adresse complète* (obligatoire):</label>
                    <input class="form-control input-default" name="adress" placeholder="eg. N°999 Abou tachfine Tlemcen 13000" required/>
                </div>

                <div class="col-md-10 mt-3">
                    <label class="form-label ">Wilaya* (obligatoire):</label>
                    <select class="form-select wilaya" name="wilaya" class="form-control input-default @error('destination') is-invalid @enderror"  required>
                        <option value="tlemcen">Tlemcen</option>
                        <option value="sba">Sidi Bel Abbès</option>
                        <option value="oran">Oran</option>
                        <option value="alger">Alger</option>
                    </select>
                </div>

                <div class="col-md-10 mt-3">
                    <label class="form-label">Voulez-vous ajouter un autre produit?</label> <br>
                 
                         <div class="form-check form-check-inline">
                            <input class="form-check-input radio-btn" type="radio" name="flexRadioDefault" id="radio-yes">
                            <label class="form-check-label" for="flexRadioDefault1">
                             Oui
                            </label>
                          </div>
                          <div class="form-check form-check-inline radio-btn">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio-no" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                             Non
                            </label>
                          </div>
           
                
                    <select class="form-select mt-3 productadd" id="select-productadd" name="productadd" class="form-control input-default @error('destination') is-invalid @enderror"  style="display: none" >
                        <option disabled selected value> -- selectionner un produit -- </option>
                        <option value="feta500">500g Feta </option>
                        <option value="moza500">500g Mozarrella</option>
                        <option value="halloumi500">500g Halloumi</option>
                        <option value="basilic">Feta huile Basilic</option>
                        <option value="cumin">Feta huile Cumin</option>
                        <option value="piment">Feta huile Piment</option>
                        <option value="boule">Boule Mozzarella fraiche</option>
                    </select>
                </div>

                <div class="col-md-10 mt-3">
                    <label class="form-label">Remarque (optionnel):</label>
                    <input class="form-control input-default"  name="remarque" placeholder="..." />
                </div>

            </div>

          
            <div class="col-md-4 mt-2" style="background-color: #EFEFEF ; padding: 30px;">
                <div class="mb-4">
                    <b> Les détails de votre commande :</b>
                </div>
                

                   
                    <label class="title-pack">Pack "{{$pack}}"</label>
                        <span>- 500 g {{$option1}}</span> <br>
                        <span>- 500 g  {{$option2}}</span> <br>
                        <span>- Féta à huile {{$option3}}</span> <br>
                        <span>- Fromage de chèvre {{$option4}}</span> <br>
                        <span>- 1 Boule Mozzarella</span> <br>
                        <span>- 500g de beurre</span> <br>
                        
                
                <div class="added-section mt-3">
                    <b >Produit ajouté : </b>

                </div>

                <div class="mt-2">
                    <b> Total : <span id="sub-total">2500</span>  </b>Da <br>
                    <p> Livraison : <span id="delivery">0</span> Da</p>
                </div>
                <div class="mt-4">
                    <b style="font-size: 25px;"> Total : <span id="total">2500.00 </span> Da</b> <br>
                    <span>Une fois votre commande validée, votre pack sera ensuite expédié afin que vous puissiez le recevoir et ainsi payer directement le livreur sur le montant. </span>
                </div>
               
            </div>
          
        </div>

        <div class="d-flex justify-content-center mt-4 mb-4">
            <button  type="submit" class="btn btn-primary " style="width: 250px;">Passer la commande</button>
        </div>

    </div>

</form>

    </div>
    </div>
 
@endsection


@push('order-scripts')

<script>
$('.radio-btn').click(function() {
   if($('#radio-no').is(':checked')) {
       $('.productadd').hide();
       $('.added-section').hide();
       $('#sub-total').html('2500');
       $('#total').html('2500');
       $('#select-productadd').prop('required',false);
       $('#inp-added').val("");
    }

   if($('#radio-yes').is(':checked')) {
       $('.productadd').show();
       $('.added-section').show();
       $('#select-productadd').prop('required',true);
    }

});


$('.productadd').on('change', function(){
    if($(this).val() == "feta500" ){
        $('.p-added').remove();
        $('.added-section').append('<span class="p-added">500g Feta</span>');
        $('#sub-total').html('3090');
        $('#total').html(parseInt($('#delivery').html())+2500 + 590);

        $('#inp-added').val("500g Feta");
        $('#inp-total').val(  parseInt($('#delivery').html())+2500 + 590);
        $('#total').html(parseInt($('#delivery').html())+2500 + 590);
        $('#total').html(parseInt($('#delivery').html())+2500 + 590);
    }

    if($(this).val() == "moza500" ){
        $('.p-added').remove();
        $('.added-section').append('<span class="p-added">500g  Mozzarella</span>');
        $('#sub-total').html('3090');

        $('#inp-added').val("500g Mozzarella");
        $('#inp-total').val(  parseInt($('#delivery').html())+2500 + 590);

        $('#total').html(parseInt($('#delivery').html())+2500 + 590);
     
    }

    if($(this).val() == "halloumi500" ){
        $('.p-added').remove();
        $('.added-section').append('<span class="p-added">500g  Halloumi</span>');
        $('#sub-total').html('2590');

        $('#inp-added').val("500g Halloumi");
        $('#inp-total').val(  parseInt($('#delivery').html())+2500 + 590);
        $('#total').html(parseInt($('#delivery').html())+2500 + 590);
       
    }

    if($(this).val() == "basilic" ){
        $('.p-added').remove();
        $('.added-section').append('<span class="p-added">Feta à huile Basilic</span>');
        $('#sub-total').html('2950');

        $('#inp-added').val("Feta huile Basilic");
        $('#inp-total').val(  parseInt($('#delivery').html())+2500 + 450);

        $('#total').html(parseInt($('#delivery').html())+2500 + 450);
       
    }
    if($(this).val() == "cumin" ){
        $('.p-added').remove();
        $('.added-section').append('<span class="p-added">Feta à huile Cumin</span>');
        $('#sub-total').html('2950');

        $('#inp-added').val("Feta huile Cumin");
        $('#inp-total').val(  parseInt($('#delivery').html())+2500 + 450);

        $('#total').html(parseInt($('#delivery').html())+2500 + 450);
    }
    if($(this).val() == "piment" ){
        $('.p-added').remove();
        $('.added-section').append('<span class="p-added">Feta à huile Piment</span>');
        $('#sub-total').html('2950');

        $('#inp-added').val("Feta huile Piment");
        $('#inp-total').val(  parseInt($('#delivery').html())+2500 + 450);

        $('#total').html(parseInt($('#delivery').html())+2500 + 450);
    }

    if($(this).val() == "boule" ){
        $('.p-added').remove();
        $('.added-section').append('<span class="p-added">Boule Mozzarella fraiche</span>');
        $('#sub-total').html('2660');

        $('#inp-added').val("Boule Mozzarella");
        $('#inp-total').val(  parseInt($('#delivery').html())+2500 + 160);

        $('#total').html(parseInt($('#delivery').html())+2500 + 160);
    }
 
});


$('.wilaya').on('change', function(){
    if($(this).val() == 'alger'){
        $('#delivery').html('200');
        $('#total').html( parseInt($('#total').html())+200);
        $('#inp-total').val(parseInt($('#total').html()));
    }


    if($(this).val() != 'alger'){
        $('#delivery').html('0');
        $('#total').html( parseInt($('#sub-total').html()));
        $('#inp-total').val(parseInt($('#total').html()));
    }
   
 
});

</script>
@endpush