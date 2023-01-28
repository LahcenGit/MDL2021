<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cartline;
use App\Models\Produit;
use App\Models\Professionalorder;
use App\Models\Professionalorderline;
use App\Models\Professionnel;
use App\Models\Tarification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('professionalParticularAuth');
    }

    public function store(Request $request){
        $professional = Professionnel::where('user_id', Auth::user()->id)->first();
        $cart_temp = Cart::where('professional_id',$professional->id)->first();
        $cartlines_temp = $cart_temp->cartlines;
        if($cartlines_temp){
            foreach($cartlines_temp as $cartline_temp){
                $cartline_temp->delete();
            }
        }

        //dd($request->products);
        $total = 0;
        $sub_total = null;
        $tva = null;
        for($i=0 ; $i<count($request->products); $i++ ){

         $cartline = new Cartline();
         $cartline->cart_id = $cart_temp->id;
         $cartline->qte = $request->qtes[$i];
         $cartline->product_id = $request->products[$i];
         if($professional->type == 'Pizzeria'){

          $tarification = Tarification::where('type','Pizzeria')->where('product_id',$request->products[$i])->first();
          if($tarification->price_two == Null && $tarification->price_tree == NULL ){
             $cartline->total = $request->qtes[$i] * $tarification->price_one;
             $cartline->pu = $tarification->price_one;
             $total = $total +  $request->qtes[$i] * $tarification->price_one;


            }
          else if($tarification->price_one != NULL && $tarification->price_two != NULL){

            if($request->qtes[$i] <= 100){
                $cartline->total = $request->qtes[$i] * $tarification->price_one;
                $cartline->pu = $tarification->price_one;
                $total = $total + $request->qtes[$i] * $tarification->price_one;

            }
            else {
                $cartline->total = $request->qtes[$i] * $tarification->price_two;
                $cartline->pu = $tarification->price_two;
                $total = $total + $request->qtes[$i] * $tarification->price_two;

            }
        }

      }
         else if($professional->type == 'Grossiste'){
            $tarification = Tarification::where('type','Grossiste')->where('product_id',$request->products[$i])->first();
            if($tarification->price_two == Null && $tarification->price_tree == NULL ){
                $cartline->total = $request->qtes[$i] * $tarification->price_one;
                $cartline->pu = $tarification->price_one;
                $total = $total +  $request->qtes[$i] * $tarification->price_one;

            }
            else if($tarification->price_one != NULL && $tarification->price_two != NULL){
               if($request->qtes[$i] >= 100){
                     $cartline->total = $request->qtes[$i] * $tarification->price_one;
                     $cartline->pu = $tarification->price_one;
                     $total = $total + $request->qtes[$i] * $tarification->price_one;

                }
                else if($request->qtes[$i] > 300) {
                    $cartline->total = $request->qte[$i] * $tarification->price_two;
                    $cartline->pu = $tarification->price_two;
                    $total = $total + $request->qte[$i] * $tarification->price_two;

                }
                else if($request->qtes[$i] < 100){
                    $cartline->total = $request->qte[$i] * 1400;
                    $cartline->pu = 1400;
                    $total = $total + $request->qte[$i] * 1400;
                }

         }
        }
         else{
           $tarification = Tarification::where('type','Orika')->where('product_id',$request->products[$i])->first();
           $cartline->total = $request->qtes[$i] * $tarification->price_one;
           $cartline->pu = $tarification->price_one;
           $total =  $total + $request->qtes[$i] * $tarification->price_one;

         }
         $cartline->save();
        }
        if($professional->type == 'Orika'){

            $tva = ($total*19)/100;
            $sub_total = $total;
            $total = $total + $tva;
        }
        $cart = Cart::where('professional_id',$professional->id)->first();
        return view('professionel.checkout',compact('cart','total','sub_total','tva'));
    }

    public function successOrder(){
        $professional = Professionnel::where('user_id',Auth::user()->id)->first();
        $cart = Cart::where('professional_id',$professional->id)->first();
        $cartlines = $cart->cartlines;
        if($cartlines){
            $total_order = Cartline::where('cart_id',$cart->id)->sum('total');
            $order = new Professionalorder();
            $order->professional_id = $professional->id;
            $order->status = 1;
            $order->total = $total_order;
            $order->save();
            foreach($cartlines as $cartline){
                $orderline = new Professionalorderline();
                $orderline->professionalorder_id = $order->id;
                $orderline->product_id = $cartline->product_id;
                $orderline->qte = $cartline->qte;
                $orderline->pu = $cartline->pu;
                $orderline->total = $cartline->total;
                $orderline->save();
                $cartline->delete();
            }
        }

        return view('professionel.success-order');
    }
}
