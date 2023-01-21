<?php

namespace App\Http\Controllers\professional;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cartline;
use App\Models\Produit;
use App\Models\Professionalorder;
use App\Models\Professionalorderline;
use App\Models\Professionnel;
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
    public function successOrder(){
        return view('professionel.success-order');
    }

    public function store(Request $request){
        $professional = Professionnel::where('user_id', Auth::user()->id)->first();
        $cart = Cart::where('professional_id',$professional->id)->first();

        for($i=0 ; $i<count($request->products); $i++ ){

         $cartline = new Cartline();
         $cartline->cart_id = $cart->id;
         $cartline->qte = $request->qtes[$i];
         $cartline->product_id = $request->products[$i];
         if($professional->type == 'Pizzeria'){
            if($request->qtes[$i] <= 100){
                $cartline->total = $request->qtes[$i] * 1400;

            }
            else {
                $cartline->total = $request->qtes[$i] * 1360;
            }
        }
         else if($professional->type == 'Grossiste'){
            if($request->qtes[$i] >= 100){
                $cartline->total = $request->qtes[$i] * 1320;
            }
            else if($request->qtes[$i] > 300) {
                $cartline->total = $request->qte[$i] * 1300;
            }
         }
         else{
           $product = Produit::find($request->products[$i]);
           $cartline->total = $request->qtes[$i] * $product->pu_ht;
         }
         $cartline->save();
        }
        return view('professionel.checkout',compact('cart'));
    }
}
