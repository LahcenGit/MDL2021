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
                                    <label class="form-label">Etat*:</label>
                                    <select class="js-example-basic-single form-select"   data-width="100%"  name="etat">
                                        <option  disabled selected>selectionner...</option>
                                        <option value="0" @if($visit->etat == 0) selected @endif>Accépté</option>
                                        <option value="1" @if($visit->etat == 1) selected @endif>Refus</option>
                                    </select>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                    <label class="form-label">Remarque*:</label>
                                    <textarea class="form-control mb-4 mb-md-0  input-default " name="note" value="{{old('note')}}" placeholder="remarque...." >{{ $visit->note }}</textarea>
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



