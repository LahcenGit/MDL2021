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
    public function successOrder(){
        return view('professionel.success-order');
    }

    public function store(Request $request){
        $professional = Professionnel::where('user_id', Auth::user()->id)->first();
        $cart = Cart::where('professional_id',$professional->id)->first();
        $cartlines = $cart->cartlines;
        if($cartlines){
            foreach($cartlines as $cartline){
                $cartline->delete();
            }
        }

        //dd($request->products);

        for($i=0 ; $i<count($request->products); $i++ ){

         $cartline = new Cartline();
         $cartline->cart_id = $cart->id;
         $cartline->qte = $request->qtes[$i];
         $cartline->product_id = $request->products[$i];
         if($professional->type == 'Pizzeria'){

          $tarification = Tarification::where('type','Pizzeria')->where('product_id',$request->products[$i])->first();
          if($tarification->price_two == Null && $tarification->price_tree == NULL ){
             $cartline->total = $request->qtes[$i] * $tarification->price_one;

            }
          else if($tarification->price_one != NULL && $tarification->price_two != NULL){

            if($request->qtes[$i] <= 100){
                $cartline->total = $request->qtes[$i] * $tarification->price_one;

            }
            else {
                $cartline->total = $request->qtes[$i] * $tarification->price_two;
            }
        }
      }
         else if($professional->type == 'Grossiste'){
            $tarification = Tarification::where('type','Grossiste')->where('product_id',$request->products[$i])->first();
            if($tarification->price_two == Null && $tarification->price_tree == NULL ){
                $cartline->total = $request->qtes[$i] * $tarification->price_one;

            }
            else if($tarification->price_one != NULL && $tarification->price_two != NULL){
               if($request->qtes[$i] >= 100){
                        $cartline->total = $request->qtes[$i] * $tarification->price_one;
                }
                else if($request->qtes[$i] > 300) {
                        $cartline->total = $request->qte[$i] * $tarification->price_two;
                }

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
