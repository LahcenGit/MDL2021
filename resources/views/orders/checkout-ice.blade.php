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
<h4 class="text-center mb-3 mt-4"> <span style="color: #6FB53E">Etape 2/2 : </span> Remplir vos informations  </h4>
<p class="text-muted text-center mb-4 pb-2">Veuillez indiquer ci-dessous les informations nécessaires pour la livraison</p>

<form action="{{asset('/orders')}}" method="post">
    @csrf

    <input type="hidden" name="pack" value="glaces">
    <input type="hidden" id="inp-total" name="total" value="2000">
    <input type="hidden" id="inp-added" name="added" >
   
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
                

                   
                    <label class="title-pack">Pack "Glaces"</label>
                        <span>- 8x400g crème glacée </span> <br>
                        <span>- 5 goûts</span> <br>
                        <span>- Sans conservateurs</span> <br>
                        <span>- Sans Colorants</span> <br>
                        
                
           

                <div class="mt-2">
                    <b> Total : <span id="sub-total">2000</span>  </b>Da <br>
                    <p> Livraison : <span id="delivery">Gratuite</span> </p>
                </div>
                <div class="mt-4">
                    <b style="font-size: 25px;"> Total : <span id="total">2000.00 </span> Da</b> <br>
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


