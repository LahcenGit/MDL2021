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
Route::get('/login-milkcheck', function () {
    return view('auth/login-milkcheck');
});

Route::get('/dashboard-admin', function () {
    return view('admin.dashboard-admin');
});

Route::get('/badge', function () {
    return view('badge');
});




Route::resource('milkcheck/vendeurs', VendeurController::class);
Route::resource('milkcheck/agrements', AgrementController::class);
Route::resource('milkcheck/achats', AchatController::class);
Route::resource('milkcheck/profil', ProfilmilkcheckController::class);
Route::resource('milkcheck', MilkchecController::class);
Route::resource('journeedulait', EleveurController::class);
Route::resource('dashboard-admin/particuliers', AdminController::class);
Route::resource('dashboard-admin/categories', CategorieController::class);
Route::resource('dashboard-admin/produits', ProduitController::class);
<<<<<<< Updated upstream
Route::get('statistique', [App\Http\Controllers\EleveurController::class, 'statistique']);
=======

Route::get('statistique', [App\Http\Controllers\EleveurController::class, 'statistique']);
Route::get('statistique-confirmation', [App\Http\Controllers\EleveurController::class, 'statistiqueConfirm']);
Route::get('confirm/{id}/{type}', [App\Http\Controllers\EleveurController::class, 'confirm']);


>>>>>>> Stashed changes
Route::get('print-achat', [App\Http\Controllers\PrinterController::class, 'achats']);
Route::get('print-vendeur', [App\Http\Controllers\PrinterController::class, 'vendeurs']);
Route::get('data-f', [App\Http\Controllers\MilkchecController::class, 'dataf']);
Route::get('/show-achat/{id}', [App\Http\Controllers\AchatController::class, 'showAchat']);
Route::get('/get-date/{id}', [App\Http\Controllers\AchatController::class, 'getDate']);
Route::get('/get-commune/{name}', [App\Http\Controllers\EleveurController::class, 'selectCommune']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register-pro', function () {
    return view('professionel/register-pro');
});



Route::get('/register-particulier', function () {
    return view('particulier.register-particulier');
});


Route::get('/produit', function () {
    return view('produit');
});

Route::get('home-dashboard', function () {
    return view('home-dashboard');
});

use App\Http\Controllers\PhotoCommentController;

Route::resource('photos.comments', PhotoCommentController::class);
