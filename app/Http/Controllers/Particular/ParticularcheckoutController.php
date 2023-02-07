<?php

namespace App\Http\Controllers\Particular;

use App\Http\Controllers\Controller;
use App\Models\Particularcart;
use App\Models\Particularcartline;
use App\Models\Particularorder;
use App\Models\Particularorderline;
use App\Models\Particulier;
use App\Models\Produit;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticularcheckoutController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('professionalParticularAuth');
    }
    public function store(Request $request){
        $particular = Particulier::where('user_id', Auth::user()->id)->first();
        $cart_temp = Particularcart::where('particular_id',$particular->id)->first();
        $cartlines_temp = Particularcartline::where('particularcart_id',$cart_temp->id)->get();
        if($cartlines_temp){
            foreach($cartlines_temp as $cartline_temp){
                $cartline_temp->delete();
            }
        }
        $total = 0;
        $total_temp = 0;
        for($i=0 ; $i<count($request->products); $i++ ){
            $product = Produit::find($request->products[$i]);
            $total_temp = $total_temp +$request->qtes[$i] * $product->pu_ht;
        }
        if($total_temp < 2000){
            $error = 1;
            $products = Produit::where('type','particular')->orderBy('flag','asc')->get();
            return view('particulier.order-particular',compact('error','products'));
        }
        for($i=0 ; $i<count($request->products); $i++ ){
         $cartline = new Particularcartline();
         $cartline->particularcart_id = $cart_temp->id;
         $cartline->qte = $request->qtes[$i];
         $cartline->product_id = $request->products[$i];
         $product = Produit::find($request->products[$i]);
         $cartline->total = $request->qtes[$i] * $product->pu_ht;
         $cartline->pu = $product->pu_ht;
         $total =  $total + $request->qtes[$i] * $product->pu_ht;
         $cartline->save();
        }

        $cart = Particularcart::where('particular_id',$particular->id)->first();
        $wilayas = Wilaya::all();
        return view('particulier.checkout',compact('cart','total','wilayas'));
    }
    public function successOrder(Request $request){
        $particular = Particulier::where('user_id',Auth::user()->id)->first();
        $cart = Particularcart::where('particular_id',$particular->id)->first();
        $cartlines = $cart->cartlines;
        if($cartlines){
            $total_order = Particularcartline::where('particularcart_id',$cart->id)->sum('total');
            $order = new Particularorder();
            $order->particular_id= $particular->id;
            $order->name = $request->name;
            $order->address = $request->address;
            $order->wilaya = $request->wilaya;
            $order->phone = $request->phone;
            $order->status = 1;
            $order->total = $total_order;
            $order->note = $request->note;
            $order->save();
            foreach($cartlines as $cartline){
                $orderline = new Particularorderline();
                $orderline->particularorder_id = $order->id;
                $orderline->product_id = $cartline->product_id;
                $orderline->qte = $cartline->qte;
                $orderline->pu = $cartline->pu;
                $orderline->total = $cartline->total;
                $orderline->save();
                $cartline->delete();
            }
        }

        return view('particulier.success-order');
    }
}
