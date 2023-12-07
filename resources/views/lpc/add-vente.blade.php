@extends('layouts.milkcheck')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter une vente</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ajouter vente</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                    <form class="forms-sample" method="POST" action="{{url('/milkcheck/lpc/ventes')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Client *:</label>
                                <select class="js-example-basic-single  form-select" name="client" class="form-control input-default @error('client') is-invalid @enderror" id="exampleFormControlSelect1" required>
                                    <option value="0">select</option>
                                    @foreach ($clients as $client)
                                        <option value="{{$client->id}}" @if (old('collector') == $client->id) selected @endif>{{$client->name}}</option>
                                    @endforeach
                                    @error('client')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </select>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Quantité vendu*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('qte') is-invalid @enderror" name="qte" value="{{old('qte')}}" placeholder="0.0 L" />
                                @error('qte')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Prix:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('price') is-invalid @enderror" name="price" value="{{old('price')}}" placeholder="21.00 DA" disabled />
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                        </div>


                        <button class="btn btn-primary" type="submit">Ajouter la vente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
