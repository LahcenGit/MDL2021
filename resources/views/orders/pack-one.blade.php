@extends('layouts.order')

<style>
.title-order{
    font-size: 20px;
}
.check-radio{
    padding: 15px;
}

div label input {
   margin-right:100px;
}
#ck-button {
    margin:4px;
    background-color:#EFEFEF;
    border-radius:4px;
    border:1px solid #D0D0D0;
    overflow:auto;
    float:left;
}

#ck-button:hover {
    background:red;
}

#ck-button label {
    float:left;
    width:4.0em;
}

#ck-button label span {
    text-align:center;
    padding:3px 0px;
    display:block;
}

#ck-button label input {
    position:absolute;
    top:-20px;
}

#ck-button input:checked + span {
    background-color:#911;
    color:#fff;
}
</style>
@section('content')


<div class="card">
<div class="card-body">
<h4 class="text-center mb-3 mt-4"> <span style="color: #6FB53E">Etape 2/3 : </span> Personnaliser votre pack <span style="color: #6FB53E">Tot bag</span>  </h4>
<p class="text-muted text-center mb-4 pb-2">Veuillez sélectionner le type du fromage</p>
<form action="{{asset('/orders/informations')}}" method="post">
    @csrf
    <div class="container" style="margin-top: 50px;">  
        <div class="row">
            <div class="col-md-6 mt-2">
                <label for="exampleFormControlSelect1" class="form-label">1- Fromage 500g au choix</label>
                <select class="form-select" name="option1" class="form-control input-default " required>
                    <option value="Mozzarella">Mozzarella</option>
                    <option value="Feta">Feta</option>
                    <option value="Halloumi">Halloumi</option>
                </select>
            </div>

            <div class="col-md-6 mt-2">
                <label for="exampleFormControlSelect1" class="form-label">2- Fromage 500g au choix</label>
                <select class="form-select" name="option2" class="form-control input-default" required>
                    <option value="Mozzarella">Mozzarella</option>
                    <option value="Feta">Feta</option>
                    <option value="Halloumi">Halloumi</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6" >
                <label class="form-label">3- La troisième option</label> <br>
                <label class="form-label" style="background-color: #E2E2E2; padding:20px;">3 x Boule Mozzarella</label>
            </div>
            <div class="col-md-6" >
                <label class="form-label">4- La quatrième option</label> <br>
                <label class="form-label" style="background-color: #E2E2E2; padding:20px;">1 Tot Bag</label>
            </div>

        </div>

        <input type="hidden" value="pack1" name="pack">

        <div class="d-flex justify-content-center mb-4">

            <a  class="btn btn-secondary mt-4" style="margin-right: 10px" href="{{asset('/orders/packs')}}"> < Retour</a>
            <button type="submit" class="btn btn-primary mt-4 " style="width: 150px;">Etape suivante ></button>
        </div>

    </div>
</form>

    </div>
    </div>
 
@endsection