@extends('layouts.milkcheck')
@section('content')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Milkcheck</a></li>
            <li class="breadcrumb-item active" aria-current="page">Fabrication crème brute</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Fabrication crème brute</h6>

                    <form class="forms-sample" method="POST" action="{{url('/milkcheck/product-fabrication')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mt-3 col-md-6">
                                <label class="form-label">Qte crème brute :</label>
                                <input class="form-control mb-4 mb-md-0 input-default " placeholder="Qte." name="qte"/>
                            </div>
                            <div class="mt-3 col-md-6">
                                <label class="form-label label">Date :</label>
                                <input type="date" class="form-control mb-4 mb-md-0 input-default " value="{{ $date }}" name="date"/>
                            </div>
                        </div>
                         <button style="width: 150;" class=" mt-3 btn btn-primary " type="submit">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
