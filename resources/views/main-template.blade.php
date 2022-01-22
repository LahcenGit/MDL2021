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
<h3 class="text-center mb-3 mt-4"> <span style="color: #6FB53E">Les nouveaux packs </span> 2022 arrivent !   </h3>

<p class="text-muted text-center mb-4 pb-2">Des produits 100% naturels à base de lait de vache</p>


    <div class="container" style="margin-top: 25px;">  
		
        
          
        

        <div class="d-flex justify-content-center mt-2 mb-4">
			<a href="{{asset('/orders/packs')}}" class="btn btn-primary " style="width: 250px;"><h4>Découvrir</h4></a>
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