@extends('layouts.milkcheck')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Générer rapport</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Générer rapport</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                    <form class="forms-sample" method="POST" action="{{url('/milkcheck/lpc/generate-repport')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Mois *:</label>
                                <select class="js-example-basic-single  form-select" name="month" class="form-control input-default" id="exampleFormControlSelect1" required>
                                    <option value="0">select</option>
                                    <option value="janvier">Mois actuelle</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Produit *:</label>
                                <select class="js-example-basic-single  form-select" name="product" class="form-control input-default" id="exampleFormControlSelect1" required>
                                    <option value="0">select</option>
                                    <option value="PDL0">PDL0%</option>
                                    <option value="PDL26">PDL26%</option>
                                    <option value="Film">Film</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Générer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
