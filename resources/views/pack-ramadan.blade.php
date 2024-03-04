@extends('layouts.front')
@section('content')
<style>
    .detpricetag .inner{
        background-color: #6fb53d !important;
    }
    .detpricetag{
        background-color: #6fb53d !important;
    }
    .blue .inner{
        background-color: #6fb53d !important;
    }
    .blue{
        background-color: #6fb53d !important;
    }
    .cut-text {
    text-overflow: ellipsis;
    overflow: hidden;
    width: 120px;
    white-space: nowrap;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner" style="min-height: 0px;">
                <div class="row">
                    <div class="col-md-9">
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; Commande Pack Ramdan</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"><!--Main content-->
            <div id="title-bg">
                <div class="title">Plaisirs Laitiers du Ramadan !</div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <p>Découvrez notre pack spécial Ramadan : deux pots de Feta (parmi les saveurs fines herbes, cumin ou piments), un fromage de 500g au choix (Mozzarella, Feta ou Halloumi), deux boules de Mozzarella fraîches, et quatre pots de yaourts (chèvre ou vache).
                     Commandez dès maintenant pour une expérience laitière exquise pendant le Ramadan.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="dt-img">
                        <a class="fancybox" href="{{ asset('/ramdan-pack.jpg') }}" data-fancybox-group="gallery" title="Fromage 100% naturel "><img src="{{ asset('/ramdan-pack.jpg') }}" alt="" class="img-responsive" /></a>
                    </div>
                </div>
                <div class="col-md-4 det-desc">
                    <div class="productdata">
                        <form action="{{ asset('/pack-ramadan') }}" method="post">
                            @csrf
                            <input type="text" class="form-control" name="name" style="margin-top: 5px;" placeholder="Nom complet" required>
                            <input type="text" class="form-control" name="phone" style="margin-top: 5px;" placeholder="N° Tel" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            <select class="form-control" id="wilaya-select" name="wilaya" style="margin-top: 5px;" placeholder="Wilaya" required="">
                                <option value="" disabled="" selected="">La wilaya: </option>
                                <option value="Tlemcen">Tlemcen</option>
                                <option value="Sba">Sidi Bel Abbes</option>
                                <option value="Oran">Oran</option>
                                <option value="Alger">Alger</option>
                                <option value="Blida">Blida</option>
                                <option value="Tipaza">Tipaza</option>
                            </select>

                            <input type="text" class="form-control" name="address" style="margin-top: 5px;"  placeholder="Votre adresse" required>
                            <textarea id="story"class="form-control" style="margin-top: 5px;" name="remarque">
                                Une remarque ...
                            </textarea>
                            <div class="infospan"  style="margin-top: 10px;">Total : <span  style=" padding: 0px !important; font-size:20px;">2.000 Da</span></div>
                            <div class="infospan" >Livraison : <span  style="padding: 0px !important" id="delivery-cost">0 </span> Da</div>
                            <div class="infospan" >Total : <span  style="padding: 0px !important; font-size:20px;" id="final-total">2.000 </span>Da</div>
                        <button type="submit" class="btn btn-default btn-red btn-lg"  style="margin-top: 10px;font-size:15px">Commander votre pack</button>
                        </form>

                    </div>
                </div>
            </div>



            <div class="spacer"></div>
        </div><!--Main content-->


    </div>
</div>

@endsection


@push('checkout-ramadan')
<script>

$.ajaxSetup({
	headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	});

	$("#wilaya-select").change(function() {

            var name = $(this).val();
            var total = 2000;
             $.ajax({
                url: '/wilaya-coast/' + name +'/'+ total ,
                type: "GET",
                success: function (res) {
                    $('#delivery-cost').html(res.coast);
                    $('#final-total').html(res.total);

			    }
        	});
	});

</script>
@endpush
