<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\MilkchecController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\AgrementController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\EleveurController;
use App\Http\Controllers\ProfilmilkcheckController;
use App\Http\Controllers\CollectorController;
use App\Http\Controllers\BreederController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\professional\OrderProfessionalController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LaboController;
use App\Http\Controllers\Admin\ProfessionalorderController;
use App\Http\Controllers\Admin\ProfessionalController;
use App\Http\Controllers\Professional\CheckoutController;
use App\Http\Controllers\ReportController;
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

Route::get('/', function () {
    return view('main-template');
});

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
});


Route::resource('journeedulait', EleveurController::class);

//admin routes
Route::resource('dashboard-admin/categories', CategorieController::class)->middleware('can:admin');
Route::resource('dashboard-admin/products', ProduitController::class)->middleware('can:admin');
Route::resource('dashboard-admin/orders', AdminOrderController::class)->middleware('can:admin');
Route::resource('dashboard-admin/professional-orders', ProfessionalorderController::class)->middleware('can:admin');
Route::resource('dashboard-admin/professionals', ProfessionalController::class)->middleware('can:admin');
Route::get('/show-professional-orderline/{id}', [App\Http\Controllers\ProfessionalorderController::class, 'detailOrder'])->middleware('can:admin');
Route::get('dashboard-admin/order-detail/{id}', [App\Http\Controllers\AdminOrderController::class, 'orderDetail'])->middleware('can:admin');
Route::get('admin/order-ticket/{id}', [App\Http\Controllers\AdminOrderController::class, 'orderTicket'])->middleware('can:admin');
Route::get('admin/order-approuve/{id}', [App\Http\Controllers\AdminOrderController::class, 'orderApprouve'])->middleware('can:admin');
Route::get('admin/order-cancel/{id}', [App\Http\Controllers\AdminOrderController::class, 'orderCancel'])->middleware('can:admin');

Route::resource('dashboard-admin', AdminController::class)->middleware('can:admin');




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

Route::get('/register-pro', function () {
    $wilayas = Wilaya::all();
    return view('professionel/register-pro',compact('wilayas'));
});


//parcours professionel commmande

Route::resource('/order-professional', OrderProfessionalController::class);
Route::resource('/checkout', CheckoutController::class);
Route::get('/success-order', [App\Http\Controllers\professional\CheckoutController::class, 'successOrder']);
Route::get('/script', [App\Http\Controllers\professional\OrderProfessionalController::class, 'script']);

// Dashboard app professionnal 
Route::get('/app-professional', [App\Http\Controllers\professional\AppProfessionalController::class, 'index']);






Route::get('/register-particulier', function () {
    return view('particulier.register-particulier');
});



Route::get('/produit', function () {
    return view('produit');
});

Route::get('home-dashboard', function () {
    return view('home-dashboard');
});

//labo route
Route::resource('labo', LaboController::class);

Route::get('/ticket/{id}', [App\Http\Controllers\printerController::class, 'ticketPos']);

Route::get('/receipt/{id}', [App\Http\Controllers\printerController::class, 'receipt']);

use App\Http\Controllers\PhotoCommentController;

Route::resource('photos.comments', PhotoCommentController::class);
