<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\MilkchecController;
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
    return view('welcome');
});
Route::get('/login-milkcheck', function () {
    return view('auth/login-milkcheck');
});

Route::resource('milkcheck/vendeurs', VendeurController::class);
Route::resource('milkcheck/achats', AchatController::class);
Route::resource('milkcheck/profil', ProfilmilkcheckController::class);
Route::resource('milkcheck', MilkchecController::class);
Route::get('data-f', [App\Http\Controllers\MilkchecController::class, 'dataf']);
Route::get('/show-achat/{id}', [App\Http\Controllers\AchatController::class, 'showAchat']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register-pro', function () {
    return view('professionel/register-pro');
});

Route::get('/register-particulier', function () {
    return view('register-particulier');
});

Route::get('/produit', function () {
    return view('produit');
});

Route::get('home-dashboard', function () {
    return view('home-dashboard');
});

use App\Http\Controllers\PhotoCommentController;

Route::resource('photos.comments', PhotoCommentController::class);
