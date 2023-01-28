<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function detailProduct($slug){
        $product = Produit::where('slug',$slug)->first();
        $related_products = Produit::where('slug', '!=' , $slug)->where('type','particular')->limit(3)->get();
        return view('detail-product',compact('product','related_products'));
    }
}
