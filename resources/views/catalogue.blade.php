@extends('layouts.order')

<style>

.title-pack{
    font-size: 30px;
    display: block;
}


</style>
@section('content')




<div class="card">
<div class="card-body">
<h3 class="text-center mb-3 mt-4"> <span style="color: #6FB53E">Notre Catalogue</span> en ligne !   </h3>

<p class="text-muted text-center mb-4 pb-2">Découverez nos produits naturels</p>


    <div class="container" style="margin-top: 25px;">  


        <div class="d-flex justify-content-center mt-2 mb-4">
            <iframe src="https://flipbookpdf.net/web/site/18c53fbbfb494e751dee2c2be1bbe5480555b78c202211.pdf.html" width="100%" height="700" ></iframe> 
        </div>
       
        <div class="d-flex justify-content-center mt-2 mb-4">
            <a href="{{asset('/Catalogue-maison-du-lait.pdf')}}" class="btn btn-primary " style="width: 250px;"><h4>Télécharger le catalogue</h4></a>
        </div>


    </div>


	<p class="text-muted text-center mt-4 pb-2">Suivez-nous sur les réseaux sociaux </p>

	<div class="d-flex justify-content-center mt-2 mb-4">

		<a href="https://www.facebook.com/MDLTLEMCEN"><i data-feather="facebook" class="icon-md text-primary me-2"></i></a>
		<a href="https://instagram.com/maison.dulait"><i data-feather="instagram" class="icon-md text-primary me-2"></i></a>
		<a href="tel:0560099033"><i data-feather="phone-call" class="icon-md text-primary me-2"></i></a>
	
	</div>






</div>
</div>


 
@endsection



@push('order-scripts')


@endpush