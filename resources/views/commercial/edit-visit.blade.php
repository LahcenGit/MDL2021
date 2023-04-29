@extends('layouts.dashboard-commercial')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter une visite </li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" action="{{url('/commercial/visits/'.$visit->id)}}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Client*:</label>
                                <select class="js-example-basic-single form-select"   data-width="100%" id="select-professional" name="professional">
                                    <option  disabled selected>selectionner...</option>
                                    @foreach($professionals as $professional)
                                    <option value="{{ $professional->id }}"@if($visit->professional_id == $professional->id)selected @endif>{{ $professional->user->name }} - {{ $professional->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">connaissance du produit*:</label>
                                <select class="js-example-basic-single form-select"  data-width="100%"  name="cp">
                                    <option  disabled selected>selectionner...</option>
                                    <option value="1" @if($visit->cp == 1) selected @endif>oui</option>
                                    <option value="0" @if($visit->cp == 0) selected @endif>non</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                    <label class="form-label">Avis prix*:</label>
                                    <select class="js-example-basic-single form-select"   data-width="100%"  name="price_feedback">
                                        <option  disabled selected>selectionner...</option>
                                        <option value="0" @if($visit->price_feedback == 0) selcted @endif >Meilleur prix</option>
                                        <option  value="1"@if($visit->price_feedback == 1) selcted @endif>Bon prix</option>
                                        <option  value="2"@if($visit->price_feedback == 2) selcted @endif>Prix elevé</option>
                                    </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                    <label class="form-label">Etat*:</label>
                                    <select class="js-example-basic-single form-select"   data-width="100%"  name="etat">
                                        <option  disabled selected>selectionner...</option>
                                        <option @if($visit->etat == 0) selcted @endif value="0">Demande d'essai</option>
                                        <option @if($visit->etat == 1) selcted @endif value="1">Passé commande</option>
                                        <option @if($visit->etat == 2) selcted @endif value="2">Problème signalé</option>
                                        <option @if($visit->etat == 3) selcted @endif value="3">Refusé</option>
                                    </select>
                                </div>
                        </div>



                        <div class="row mb-3">
                            <div class="col-md-6">
                                    <label class="form-label">Remarque(optionnel):</label>
                                    <textarea class="form-control mb-4 mb-md-0  input-default " name="note" value="" placeholder="remarque...." >{{ $visit->note }}</textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



