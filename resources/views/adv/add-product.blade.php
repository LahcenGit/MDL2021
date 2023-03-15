@extends('layouts.dashboard-adv')

<style>
    .container {
        max-width: 500px;
    }
    dl, ol, ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .imgPreview img {
        padding: 8px;
        max-width: 100px;
    }
</style>

@section('content')
<div class="page-content">
 <nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ajouter produit</li>
    </ol>
</nav>
<form class="forms-sample" method="POST" action="{{url('/dashboard-admin/products')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ajouter Un Nouveau Produit</h6>
                    <p class="text-muted mb-3">Veuillez remplir tous les champs s'il vous plait!</p>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Designation*:</label>
                                <input class="form-control mb-4 mb-md-0  input-default @error('designation') is-invalid @enderror" name="designation" value="{{old('designation')}}" placeholder="Mozarella" />
                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Code barre*:</label>
                                 <input type="text" class="form-control mb-4 mb-md-0" name="bar_code" value="{{old('bar_code')}}" placeholder="62398745987123 " />
                             </div>
                            <div class="col-md-3">
                               <label class="form-label">Type EMB(optionnel):</label>
                                <input type="text" class="form-control mb-4 mb-md-0" name="type_emb" value="{{old('type_emb')}}" placeholder="Pot verre" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">PU HT*:</label>
                                 <input type="number" class="form-control mb-4 mb-md-0" name="pu_ht" value="{{old('pu_ht')}}" placeholder="0.00" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">DLC*:</label>
                                 <input type="text" class="form-control mb-4 mb-md-0" name="dlc" value="{{old('dlc')}}" placeholder="3 mois" />
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                               <label class="form-label">Contenance(optionnel):</label>
                                <input type="text" class="form-control mb-4 mb-md-0  input-default @error('capacity') is-invalid @enderror" name="capacity" value="{{old('capacity')}}" placeholder="500 g" />
                                    @error('capacity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Prix(optionnel):</label>
                                 <input type="number" class="form-control mb-4 mb-md-0  input-default @error('price') is-invalid @enderror" name="price" value="{{old('price')}}" placeholder="0.00" />
                                     @error('price')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                             </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Les catégories</h6>
                    <p class="text-muted mb-3">Selectionnez Une Catégorie</p>
                    <div class="mb-3">
                        <div class="form-check mb-2">
                            <label class="form-check-label" for="checkDefault">
                                @include('categories')
                            </label>
                        </div>
                    </div>
                  <div class=" text-center">
                  <button type="" class="btn btn-primary mt-3">Ajouter catégorie</button>
                  </div>
              </div>
            </div>
        </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Description courte</h4>
                        <p class="text-muted mb-3">Read the <a href="https://www.tiny.cloud/docs/" target="_blank"> Official TinyMCE Documentation </a>for a full list of instructions and other options.</p>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5">{{ old('short_description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Image principale</h6>
                            <p class="text-muted mb-3">Read the <a href="https://github.com/JeremyFagis/dropify" target="_blank"> Official Dropify Documentation </a>for a full list of instructions and other options.</p>
                            <input type="file" id="myDropify" name="first_image"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Description longue</h4>
                        <p class="text-muted mb-3">Read the <a href="https://www.tiny.cloud/docs/" target="_blank"> Official TinyMCE Documentation </a>for a full list of instructions and other options.</p>
                        <textarea class="form-control" name="tinymce" id="tinymceExample" rows="10"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Autres images : </h4>
                    </div>
                    <div class="card-body">
                            <div class="basic-form custom_file_input">
                                    <div class="input-group mb-3">
                                            <input type="file" id="images" name="photos[]" accept="image/*" multiple >
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body text-center">
                        <button type="submit"  class="btn btn-primary mt-3" >Ajouter </button>
                    </div>
                </div>
            </div>

   </form>
</div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(function() {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#images').on('change', function() {
        multiImgPreview(this, 'div.imgPreview');
    });
    });
</script>
