<?php

namespace App\Http\Controllers\Particular;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ParticularorderController extends Controller
{
    //
    public function index(){
        $products = Produit::where('type','particular')->orderBy('flag','asc')->get();
        return view('particulier.order-particular',compact('products'));
    }
}
