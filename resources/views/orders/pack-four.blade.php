@extends('layouts.order')

@section('content')


<div class="card">
<div class="card-body">
<h4 class="text-center mb-3 mt-4"> <span style="color: #6FB53E">Etape 2/3 : </span> Personnaliser votre pack <span style="color: #6FB53E">Ramadan</span>  </h4>
<p class="text-muted text-center mb-4 pb-2">Veuillez sélectionner le type du fromage</p>
<form action="{{asset('/orders/informations-pack-four')}}" method="post">
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
                <label for="exampleFormControlSelect1" class="form-label">3- Feta à huile</label>
                <select class="form-select" name="option3" class="form-control input-default" required>
                    <option value="Fines herbes">Fines herbes</option>
                    <option value="Cumin">Cumin</option>
                    <option value="Piment">Piment</option>
                </select>
            </div>
            <div class="col-md-6" >
                <label class="form-label">4- La quatrième option</label> <br>
                <label class="form-label" style="background-color: #E2E2E2; padding:20px;">1 Boule Mozzarella </label>
            </div>

        </div>
        <div class="row mt-3">
            <div class="col-md-6" >
                <label class="form-label">5- La ciquième option</label> <br>
                <label class="form-label" style="background-color: #E2E2E2; padding:20px;">500g de beurre  </label>
            </div>
            <div class="col-md-6" >
                <label class="form-label">6- La sixième option</label> <br>
                <label class="form-label" style="background-color: #E2E2E2; padding:20px;">1 pot fromage  ricotta </label>
            </div>

        </div>
        <input type="hidden" value="pack4" name="pack">

        <div class="d-flex justify-content-center mb-4">
            <a  class="btn btn-secondary mt-4" style="margin-right: 10px" href="{{asset('/orders/packs')}}"> < Retour</a>
            <button type="submit" class="btn btn-primary mt-4 " style="width: 150px;">Etape suivante ></button>
        </div>

    </div>
</form>

    </div>
    </div>
 
@endsection