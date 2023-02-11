@extends('layouts.dashboard-admin')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter une commande pour particulier</li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" action="{{url('/dashboard-admin/professionals')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                           <div class="col-md-6">
                                <label class="form-label">Client*:</label>
                                <select class="form-select" name="type"  class="form-control input-default " id="exampleFormControlSelect1">
                                    <option value=""disabled selecte>Le client :</option>
                                    @foreach($particulars as $particular)
                                    <option value="{{ $particular->id }}">{{ $particular->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Adresse*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" placeholder="adresse" />
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Wilaya:</label>
                                <select class="form-select" name="type"  class="form-control input-default " id="exampleFormControlSelect1">
                                    <option value="" disabled selected>La wilaya: </option>
                                    <option value="Alger" @if(old('wilaya')== 'Alger') selected @endif>Alger</option>
                                    <option value="Oran" @if(old('wilaya')== 'Oran') selected @endif>Oran</option>
                                    <option value="Aïn Témouchent" @if(old('wilaya')== 'Aïn Témouchent') selected @endif>Aïn Témouchent</option>
                                    <option value="Sidi Bel Abbès" @if(old('wilaya')== 'Sidi Bel Abbès') selected @endif>Sidi Bel Abbès</option>
                                </select>
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
