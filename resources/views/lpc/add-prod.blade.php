@extends('layouts.milkcheck')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter production</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ajouter production</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                    <form class="forms-sample" method="POST" action="{{url('/milkcheck/lpc/productions')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">LPC *:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('LPC') is-invalid @enderror" name="LPC" value="{{old('LPC')}}" placeholder="0.0 L"  required/>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">PDL 0%*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('PDL0') is-invalid @enderror" name="PDL0" value="{{old('PDL0')}}" placeholder="0.0 kg" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">PDL 26%*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('PDL26') is-invalid @enderror" name="PDL26" value="{{old('PDL26')}}" placeholder="0.0 kg" />
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Eau* </label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('eau') is-invalid @enderror" name="eau" value="{{old('eau')}}" placeholder="0.0 L" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Film(P.L)</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('film') is-invalid @enderror" name="film" value="{{old('film')}}" placeholder="0.0 kg" />
                                @error('film')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Lait cru *:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('lvc') is-invalid @enderror" name="lvc" value="{{old('lvc')}}" placeholder="0.0 L"  required/>
                                <span class="invalid-feedback" role="alert" style="color: red;"></span>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                        </div>


                        <button class="btn btn-primary" type="submit">Ajouter la production</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('add-lpc-production')

<script>

$(document).ready(function () {
        $('input[name="lvc"]').on('input', function () {
            var inputValue = $(this).val();
            
            // Vérifiez si la valeur est supérieure à 500
            if (parseFloat(inputValue) > 500) {
                $(this).addClass('is-invalid');
                $('.invalid-feedback').text('La valeur ne peut pas dépasser 500.');
            } else {
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').text('');
            }
        });
    });

</script>

@endpush



