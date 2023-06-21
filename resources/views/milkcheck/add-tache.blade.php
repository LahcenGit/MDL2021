@extends('layouts.milkcheck')
@section('content')
<div class="page-content">
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Milkcheck</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ajouter une tâche</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-9 grid-margin">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Ajouter une tâche</h6>
                <form class="forms-sample" method="POST" action="{{url('/milkcheck/taches')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-9">
                            <label class="form-label">tâche*:</label>
                            <input type="text" class="form-control mb-4 mb-md-0  input-default @error('tache') is-invalid @enderror" name="tache" value="{{old('tache')}}" placeholder="tâche"  required/>
                                @error('tache')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-9">
                            <label class="form-label">Déscription(optionnel):</label>
                            <textarea class="form-control mb-4 mb-md-0  input-default " name="description" value="{{old('description')}}" placeholder="description...." ></textarea>
                        </div>
                    </div>
                 <button class="btn btn-primary" type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
