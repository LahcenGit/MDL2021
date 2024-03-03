<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\MilkchecController;
use App\Http\Controllers\AdvController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\AgrementController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\EleveurController;
use App\Http\Controllers\ProfilmilkcheckController;
use App\Http\Controllers\CollectorController;
use App\Http\Controllers\BreederController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdvOrderController;
use App\Http\Controllers\professional\OrderProfessionalController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LaboController;
use App\Http\Controllers\Adv\ProfessionalorderController;
use App\Http\Controllers\Adv\ProfessionalController;
use App\Http\Controllers\Adv\ParticularController;
use App\Http\Controllers\Adv\OrderparticularController;
use App\Http\Controllers\Adv\IcecreamorderController;
use App\Http\Controllers\professional\CheckoutController;
use App\Http\Controllers\Particular\ParticularorderController;
use App\Http\Controllers\Particular\ParticularcheckoutController;
use App\Http\Controllers\commercial\VisitController;
use App\Http\Controllers\commercial\IcecreamController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Particular\ProfilParticularController;
use App\Http\Controllers\professional\ProfilProfessionalController;
use App\Http\Controllers\commercial\CommercialController;
use App\Http\Controllers\Delivry\DelivryorderController;
use App\Http\Controllers\TransformationlaitController;
use App\Http\Controllers\ProductfabricationController;
use App\Http\Controllers\Admin\StatistiqueController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\WorkertacheController;
use App\Http\Controllers\TacheController;
//lpc

use App\Http\Controllers\lpc\ClientController;
use App\Http\Controllers\lpc\VenteController;
use App\Http\Controllers\lpc\ProductionController;
use App\Http\Controllers\lpc\StockController;
use App\Http\Controllers\RamadanPackController;
use App\Models\Citie;
use App\Models\Wilaya;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/orders/informations', function () {
    return redirect('/');
});
Route::get('/orders/success', function () {
    return redirect('/');
});


Route::get('/catalogue', function () {
    return view('catalogue');
});


Route::get('/milkcheck/login', function () {

    if(Auth::check()){
        return redirect('/milkcheck');
    }
    else{
        return view('auth.login-milkcheck');
    }

});
Route::get('/admin/login', function () {

    if(Auth::check()){
        return redirect('/admin/adv');
    }
    else{
        return view('auth.login-admin');
    }

});
Route::get('/labo/login', function () {

    if(Auth::check()){
        return redirect('/labo');
    }
    else{
        return view('auth.login-labo');
    }

});

Route::get('/commercial/login', function () {

    if(Auth::check()){
        return redirect('/commercial');
    }
    else{
        return view('auth.login-commercial');
    }

});
Route::get('/adv/login', function () {

    if(Auth::check()){
        return redirect('/adv');
    }
    else{
        return view('auth.login-adv');
    }

});
Route::get('/delivry/login', function () {

    if(Auth::check()){
        return redirect('/delivry');
    }
    else{
        return view('auth.login-delivry');
    }

});
Route::get('/connexion', function () {
  if(Auth::check()){
        if(Auth::user()->type == 'professionnel'){
          return redirect('/app-professional');
        }
        else{
          return redirect('/app-particular');
        }
    }
    else{
        return view('auth.login-p');
    }

});





Route::get('/badge', function () {
    return view('badge');
});
Route::middleware('milkcheckAuth')->group(function () {
    Route::get('/milkcheck',[App\Http\Controllers\MilkchecController::class, 'index'])->name('milkcheck')->middleware('can:milkcheck');

    Route::resource('milkcheck/vendeurs', VendeurcController::class)->middleware('can:milkcheck');
    Route::resource('milkcheck/collectors', CollectorController::class)->middleware('can:milkcheck');
    //show achat detail page
    Route::get('/milkcheck/achats/create/{id}',[App\Http\Controllers\AchatController::class, 'createAchat'])->middleware('can:milkcheck');
    Route::resource('milkcheck/breeders', BreederController::class)->middleware('can:milkcheck');
    Route::resource('milkcheck/transformation-milk', TransformationlaitController::class)->middleware('can:milkcheck');
    Route::resource('milkcheck/product-fabrication', ProductfabricationController::class)->middleware('can:milkcheck');

    //worker-tache
    Route::resource('milkcheck/workers', WorkerController::class)->middleware('can:milkcheck');
    Route::resource('milkcheck/taches', TacheController::class)->middleware('can:milkcheck');
    Route::resource('milkcheck/worker-taches', WorkertacheController::class)->middleware('can:milkcheck');
    Route::get('/modal-add-note/{id}',[App\Http\Controllers\WorkertacheController::class, 'showModal'])->middleware('can:milkcheck');
    Route::post('/store-note',[App\Http\Controllers\WorkertacheController::class, 'storeNote'])->middleware('can:milkcheck');
    Route::get('/update-note',[App\Http\Controllers\WorkertacheController::class, 'updateNote'])->middleware('can:milkcheck');

    //paiements

    Route::get('/milkcheck/paiements/etat/',[App\Http\Controllers\PaiementMilkcheckController::class, 'indexEtat'])->middleware('can:milkcheck');
    Route::get('/milkcheck/paiements/etat/{id}',[App\Http\Controllers\PaiementMilkcheckController::class, 'etatSchow'])->middleware('can:milkcheck');



    Route::get('/milkcheck/accords/collectors/',[App\Http\Controllers\AgrementController::class, 'collectorsAccord'])->middleware('can:milkcheck');
    Route::get('/milkcheck/accords/breeders/',[App\Http\Controllers\AgrementController::class, 'breedersAccord'])->middleware('can:milkcheck');
    Route::resource('milkcheck/achats', AchatController::class)->middleware('can:milkcheck');
    Route::resource('milkcheck/profil', ProfilmilkcheckController::class)->middleware('can:milkcheck');
    Route::resource('milkcheck/parameters', SettingController::class)->middleware('can:milkcheck');


     //Report
     Route::get('/milkcheck/report',[App\Http\Controllers\ReportController::class, 'index'])->middleware('can:milkcheck');
     Route::get('/milkcheck/select-breeder',[App\Http\Controllers\ReportController::class, 'selectBreeder'])->middleware('can:milkcheck');
     Route::get('/milkcheck/get-type/{type}',[App\Http\Controllers\ReportController::class, 'getType'])->middleware('can:milkcheck');
     Route::post('/milkcheck/report-detail',[App\Http\Controllers\ReportController::class, 'reportDetail'])->middleware('can:milkcheck');
     Route::get('/milkcheck/achat-ticket/{id}', [App\Http\Controllers\ReportController::class, 'achatTicket'])->middleware('can:milkcheck');
     Route::get('/milkcheck/generate-fiche-payment',[App\Http\Controllers\ReportController::class, 'generateFiche'])->middleware('can:milkcheck');
     Route::post('/milkcheck/generate-fiche-payment',[App\Http\Controllers\ReportController::class, 'fichePayment'])->middleware('can:milkcheck');
     Route::get('/milkcheck/generate-fiche-soutien',[App\Http\Controllers\ReportController::class, 'generateFicheSoutien'])->middleware('can:milkcheck');
     Route::post('/milkcheck/generate-fiche-soutien',[App\Http\Controllers\ReportController::class, 'ficheSoutienBreeder'])->middleware('can:milkcheck');

     Route::get('milkcheck/productions/create', [App\Http\Controllers\Labo\LaboController::class,'createProduction'])->middleware('can:milkcheck');
     Route::post('milkcheck/productions', [App\Http\Controllers\Labo\LaboController::class,'storeProduction'])->middleware('can:milkcheck');
     Route::get('milkcheck/productions', [App\Http\Controllers\Labo\LaboController::class,'productions'])->middleware('can:milkcheck');
     Route::get('milkcheck/productions/edit/{id}', [App\Http\Controllers\Labo\LaboController::class,'editProduction'])->middleware('can:milkcheck');
     Route::put('milkcheck/productions/{id}', [App\Http\Controllers\Labo\LaboController::class,'updateProduction'])->middleware('can:milkcheck');
     Route::get('modal-production-line/{id}', [App\Http\Controllers\Labo\LaboController::class,'showModalProduction'])->middleware('can:milkcheck');
     Route::delete('milkcheck/productions/{id}', [App\Http\Controllers\Labo\LaboController::class,'destroy'])->middleware('can:milkcheck');


     //lpc
     Route::resource('milkcheck/lpc/clients', ClientController::class)->middleware('can:milkcheck');
     Route::resource('milkcheck/lpc/productions', ProductionController::class)->middleware('can:milkcheck');
     Route::resource('milkcheck/lpc/ventes', VenteController::class)->middleware('can:milkcheck');
     Route::resource('milkcheck/lpc/stocks', StockController::class)->middleware('can:milkcheck');
     Route::get('modal-add-stock-init', [App\Http\Controllers\lpc\StockController::class,'showModalAddStockInit'])->middleware('can:milkcheck');
     Route::get('modal-add-entree', [App\Http\Controllers\lpc\StockController::class,'showModalAddEntree'])->middleware('can:milkcheck');
     Route::post('store-stock-initial', [App\Http\Controllers\lpc\StockController::class,'storestockInitial'])->middleware('can:milkcheck');
     Route::post('store-entree', [App\Http\Controllers\lpc\StockController::class,'storeEntree'])->middleware('can:milkcheck');
     Route::get('/milkcheck/lpc/repport', [App\Http\Controllers\lpc\ReportController::class,'index'])->middleware('can:milkcheck');
     Route::post('/milkcheck/lpc/generate-repport', [App\Http\Controllers\lpc\ReportController::class,'generateRepport'])->middleware('can:milkcheck');

});


Route::resource('journeedulait', EleveurController::class);

//adv routes

Route::middleware('auth')->group(function () {
    Route::resource('adv/categories', CategorieController::class)->middleware('can:adv');
    Route::resource('adv/products', ProduitController::class)->middleware('can:adv');
    Route::resource('adv/orders', AdvOrderController::class)->middleware('can:adv');
    Route::resource('adv/professional-orders', ProfessionalorderController::class)->middleware('can:adv');
    Route::resource('adv/professionals', ProfessionalController::class)->middleware('can:adv');
    Route::resource('adv/particulars', ParticularController::class)->middleware('can:adv');
    Route::resource('adv/particular-orders', OrderparticularController::class)->middleware('can:adv');
    Route::get('/show-professional-orderline/{id}', [App\Http\Controllers\Adv\ProfessionalorderController::class, 'detailOrder'])->middleware('can:adv');
    Route::get('/show-particular-orderline/{id}', [App\Http\Controllers\Adv\OrderparticularController::class, 'detailOrder'])->middleware('can:adv');
    Route::get('adv/order-detail/{id}', [App\Http\Controllers\AdvOrderController::class, 'orderDetail'])->middleware('can:adv');
    Route::get('adv/order-professional-detail/{id}', [App\Http\Controllers\AdvOrderController::class, 'orderDetailProfessional'])->middleware('can:adv');
    Route::get('adv/order-ticket/{id}', [App\Http\Controllers\AdvOrderController::class, 'orderTicket'])->middleware('can:adv');
    Route::get('adv/order-approuve/{id}', [App\Http\Controllers\AdvOrderController::class, 'orderApprouve'])->middleware('can:adv');
    Route::get('adv/order-cancel/{id}', [App\Http\Controllers\AdvOrderController::class, 'orderCancel'])->middleware('can:adv');
    Route::get('adv/add-order-particular', [App\Http\Controllers\Adv\ParticularController::class, 'addOrder'])->middleware('can:adv');
    Route::post('adv/add-order-particular', [App\Http\Controllers\Adv\ParticularController::class, 'storeOrder'])->middleware('can:adv');
    Route::get('/get-phone/{id}', [App\Http\Controllers\Adv\ParticularController::class, 'getInformations'])->middleware('can:adv');
    Route::get('/adv/particulars', [App\Http\Controllers\Adv\ParticularController::class, 'index'])->middleware('can:adv');
    Route::get('/adv/commercial', [App\Http\Controllers\AdvController::class, 'commercial'])->middleware('can:adv');
    Route::get('/show-modal-delivry/{id}', [App\Http\Controllers\AdvController::class, 'showModal'])->middleware('can:adv');
    Route::post('/store-delivry-order', [App\Http\Controllers\AdvController::class, 'storeDelivryOrder'])->middleware('can:adv');
    Route::get('adv/delivery-orders', [App\Http\Controllers\AdvController::class, 'deliveryOrders'])->middleware('can:adv');
    Route::delete('adv/delivery-orders/{id}', [App\Http\Controllers\AdvController::class, 'deleteDeliveryOrder'])->middleware('can:adv');
    Route::resource('adv/ice-cream-orders',IcecreamorderController::class)->middleware('can:adv');
    Route::get('adv/edit-status/{id}', [App\Http\Controllers\Adv\ProfessionalorderController::class, 'editStatus'])->middleware('can:adv');
    Route::post('adv/update-status', [App\Http\Controllers\Adv\ProfessionalorderController::class, 'updateStatus'])->middleware('can:adv');

    // pack ramadan route
    Route::get('adv/orders-pack-ramadan', [App\Http\Controllers\AdvOrderController::class, 'orderRamadanPacks'])->middleware('can:adv');
    Route::get('adv/order-pack-ramadan-detail/{id}', [App\Http\Controllers\AdvOrderController::class, 'detailOrderPackRamadan'])->middleware('can:adv');
    Route::get('adv/edit-status-order-pack-ramadan/{id}', [App\Http\Controllers\AdvOrderController::class, 'editStatus'])->middleware('can:adv');
    Route::put('adv/edit-status-order-pack-ramadan/{id}', [App\Http\Controllers\AdvOrderController::class, 'updateStatus'])->middleware('can:adv');
    Route::resource('adv', AdvController::class)->middleware('can:adv');

});
Route::resource('adv/ramadan-packs',RamadanPackController::class);

Route::get('statistique', [App\Http\Controllers\EleveurController::class, 'statistique']);
Route::get('print-achat', [App\Http\Controllers\PrinterController::class, 'achats']);
Route::get('print-vendeur', [App\Http\Controllers\PrinterController::class, 'vendeurs']);
Route::get('data-f', [App\Http\Controllers\MilkchecController::class, 'dataf']);
Route::get('data-d', [App\Http\Controllers\MilkchecController::class, 'datad']);
Route::get('data-p', [App\Http\Controllers\MilkchecController::class, 'datap']);
Route::get('/show-achat/{id}', [App\Http\Controllers\AchatController::class, 'showAchat']);
Route::get('/get-date/{id}', [App\Http\Controllers\AchatController::class, 'getDate']);
Route::get('/get-commune/{name}', [App\Http\Controllers\EleveurController::class, 'selectCommune']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/tracking-professional/{id}/{latitute}/{longitude}', [App\Http\Controllers\GoogleMapsController::class, 'obtenirItineraire']);




//orders
Route::get('orders/packs', [App\Http\Controllers\OrderController::class, 'packs']);
Route::get('orders/pack-one', [App\Http\Controllers\OrderController::class, 'definePackOne']);
Route::get('orders/pack-two', [App\Http\Controllers\OrderController::class, 'definePackTwo']);
Route::get('orders/pack-three', [App\Http\Controllers\OrderController::class, 'definePackThree']);
Route::get('orders/pack-four', [App\Http\Controllers\OrderController::class, 'definePackFour']);
Route::post('orders/informations', [App\Http\Controllers\OrderController::class, 'finalStep']);
Route::post('orders/informations-pack-four', [App\Http\Controllers\OrderController::class, 'finalStep']);
Route::get('orders/success/{name}', [App\Http\Controllers\OrderController::class, 'success']);
Route::resource('orders', OrderController::class);
Route::get('/checkout-ice-cream', [App\Http\Controllers\OrderController::class, 'checkoutIce']);



Route::get('/eleveurs-event', [App\Http\Controllers\EleveurController::class, 'statistiqueConfirm']);




//parcours professionel

Route::get('/register-professional', function () {
    $wilayas = Wilaya::all();
    return view('professionel/register-pro',compact('wilayas'));
});

// Dashboard app professionnal
Route::middleware('professionalParticularAuth')->group(function () {
    Route::resource('/app-professional/order-professional', OrderProfessionalController::class);
    Route::resource('/app-professional/checkout', CheckoutController::class);
    Route::get('/app-professional/success-order', [App\Http\Controllers\professional\CheckoutController::class, 'successOrder']);
    Route::get('/script', [App\Http\Controllers\professional\OrderProfessionalController::class, 'script']);
    Route::get('/app-professional', [App\Http\Controllers\professional\AppProfessionalController::class, 'index']);
    Route::resource('/app-professional/profil', ProfilProfessionalController::class);
    Route::get('/app-professional/order-lines/{id}', [App\Http\Controllers\professional\AppProfessionalController::class, 'orderLines']);
});


//parcours particular
Route::get('/register-particular', function () {
    $wilayas = Wilaya::all();
    return view('particulier.register-particulier',compact('wilayas'));
});

//Dashboard app particular
Route::middleware('professionalParticularAuth')->group(function () {
    Route::get('/app-particular', [App\Http\Controllers\Particular\AppParticularController::class, 'index'])->middleware('can:particular');
    Route::resource('/app-particular/order', ParticularorderController::class)->middleware('can:particular');
    Route::resource('/app-particular/checkout', ParticularcheckoutController::class)->middleware('can:particular');
    Route::post('/app-particular/success-order', [App\Http\Controllers\Particular\ParticularcheckoutController::class, 'successOrder'])->middleware('can:particular');
    Route::get('/app-particular/order-lines/{id}', [App\Http\Controllers\Particular\AppParticularController::class, 'orderLines'])->middleware('can:particular');
    Route::resource('/app-particular/profil', ProfilParticularController::class)->middleware('can:particular');
    Route::get('/app-particular/success-order', function () {
       return view('particulier.success-order');
    });

    //added fees to wilaya

    Route::get('/app-particular/wilaya-coast/{name}/{total}', [App\Http\Controllers\Particular\AppParticularController::class, 'wilayaCost'])->middleware('can:particular');

});

//
Route::get('/produit', function () {
    return view('produit');
});

Route::get('home-dashboard', function () {
    return view('home-dashboard');
});





//commercial route
Route::middleware('CommercialAuth')->group(function () {
Route::get('commercial', [App\Http\Controllers\commercial\CommercialController::class,'index'])->middleware('can:commercial');
Route::get('commercial/professionals/create', [App\Http\Controllers\commercial\CommercialController::class,'createProfessional'])->middleware('can:commercial');
Route::post('commercial/professionals', [App\Http\Controllers\commercial\CommercialController::class,'storeProfessional'])->middleware('can:commercial');
Route::get('commercial/professionals', [App\Http\Controllers\commercial\CommercialController::class,'professionals'])->middleware('can:commercial');
Route::get('commercial/order-professionals/create', [App\Http\Controllers\commercial\CommercialController::class,'createOrder'])->middleware('can:commercial');
Route::post('commercial/order-professionals', [App\Http\Controllers\commercial\CommercialController::class,'storeOrder'])->middleware('can:commercial');
Route::get('commercial/order-professionals', [App\Http\Controllers\commercial\CommercialController::class,'orders'])->middleware('can:commercial');
Route::get('commercial/order-professionals/edit/{id}', [App\Http\Controllers\commercial\CommercialController::class,'editOrder'])->middleware('can:commercial');
Route::put('commercial/order-professionals/{id}', [App\Http\Controllers\commercial\CommercialController::class,'updateOrder'])->middleware('can:commercial');
Route::get('commercial/professionals/edit/{id}', [App\Http\Controllers\commercial\CommercialController::class,'editProfessional'])->middleware('can:commercial');
Route::put('commercial/professionals/{id}', [App\Http\Controllers\commercial\CommercialController::class,'updateProfessional'])->middleware('can:commercial');
Route::get('get-type/{id}', [App\Http\Controllers\commercial\CommercialController::class,'getType'])->middleware('can:commercial');
Route::get('modal-order-line/{id}', [App\Http\Controllers\commercial\CommercialController::class,'showModal'])->middleware('can:commercial');
Route::resource('commercial/visits',VisitController::class)->middleware('can:commercial');
Route::resource('commercial/ice-cream-orders',IcecreamController::class)->middleware('can:commercial');
Route::get('commercial/order-professional-detail/{id}', [App\Http\Controllers\commercial\CommercialController::class, 'orderDetailProfessional'])->middleware('can:commercial');
Route::get('edit-status/{id}', [App\Http\Controllers\commercial\CommercialController::class, 'editStatus'])->middleware('can:commercial');
Route::post('update-status', [App\Http\Controllers\commercial\CommercialController::class, 'updateStatus'])->middleware('can:commercial');
Route::delete('delete-order/{id}', [App\Http\Controllers\commercial\CommercialController::class, 'deleteOrder'])->middleware('can:commercial');

});

Route::get('redirect-position/{latitude}/{longitude}', [App\Http\Controllers\commercial\CommercialController::class, 'obtenirItineraire']);
//labo route
Route::middleware('LaboAuth')->group(function () {
Route::get('labo', [App\Http\Controllers\Labo\LaboController::class,'index'])->middleware('can:labo');

});
//admin route
Route::middleware('AdminAuth')->group(function () {
Route::get('admin', [App\Http\Controllers\Admin\AdminController::class,'index'])->middleware('can:admin');
Route::get('admin/adv', [App\Http\Controllers\Admin\AdminController::class,'advOrders'])->middleware('can:admin');
Route::get('admin/commercial', [App\Http\Controllers\Admin\AdminController::class,'commercial'])->middleware('can:admin');
Route::get('admin/production', [App\Http\Controllers\Admin\AdminController::class,'production'])->middleware('can:admin');
Route::get('admin/workers', [App\Http\Controllers\Admin\AdminController::class,'workers'])->middleware('can:admin');
Route::resource('admin/statistiques',StatistiqueController::class);
Route::get('/get-data', [App\Http\Controllers\Admin\StatistiqueController::class,'getData'])->middleware('can:admin');
});
//

//livreur route
Route::resource('delivry',DelivryorderController::class);
Route::get('/confirm-delivery/{id}', [App\Http\Controllers\Delivry\DelivryorderController::class, 'confirmDelivery']);


Route::get('/ticket/{id}', [App\Http\Controllers\printerController::class, 'ticketPos']);

Route::get('/receipt/{id}', [App\Http\Controllers\printerController::class, 'receipt']);



//front route
Route::get('/product/{slug}', [App\Http\Controllers\FrontController::class, 'detailProduct']);
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'detailBlog']);
Route::get('/', [App\Http\Controllers\FrontController::class, 'welcome']);
Route::get('/products', [App\Http\Controllers\FrontController::class, 'products']);
Route::resource('/contact',ContactController::class);
Route::resource('/comment',CommentController::class);
Route::get('/about', function () {
    return view('about');
});
Route::get('/quality', function () {
    return view('quality');
});
Route::get('/recipes', function () {
    return view('recipe');
});

Route::get('/professionnel-pack-order', function () {
    return view('professionel.do-not-access');
});



