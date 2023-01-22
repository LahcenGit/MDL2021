<?php

namespace App\Http\Controllers\professional;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cartline;
use App\Models\Produit;
use App\Models\Professionalorder;
use App\Models\Professionalorderline;
use App\Models\Professionnel;
use App\Models\Tarification;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderProfessionalController extends Controller
{
    public function index(){
        $wilayas = Wilaya::all();
        $products = Produit::orderBy('flag','Asc')->get();
        return view('professionel.order-pro',compact('wilayas','products'));
    }



 public function script(){
    $products = Produit::all();
        foreach($products as $product){
         $tarification = new Tarification();
         $tarification->type = 'Pizzeria';
         $tarification->product_id = $product->id;
         $tarification->price_one = $product->pu_ht;
         $tarification->save();
        }
        foreach($products as $product){
            $tarification = new Tarification();
            $tarification->type = 'Grossiste';
            $tarification->product_id = $product->id;
            $tarification->price_one = $product->pu_ht;
            $tarification->save();
           }
           foreach($products as $product){
            $tarification = new Tarification();
            $tarification->type = 'Orika';
            $tarification->product_id = $product->id;
            $tarification->price_one = $product->pu_ht;
            $tarification->save();
           }
    }
}
