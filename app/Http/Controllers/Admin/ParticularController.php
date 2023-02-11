<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Particularcart;
use App\Models\Particularorder;
use App\Models\Particularorderline;
use App\Models\Particulier;
use App\Models\Produit;
use App\Models\User;
use App\Models\Wilaya;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParticularController extends Controller
{
    //
    public function addOrder(){
        $particulars = Particulier::all();
        $products = Produit::where('type','particular')->orderBy('flag','asc')->get();
        $wilayas = Wilaya::all();
        return view('admin.add-order-particular',compact('particulars','products','wilayas'));
    }

    public function storeOrder(Request $request){

        if($request->check == 1){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->type = 'particulier';
            $user->save();
            $particular = new Particulier();
            $particular->user_id = $user->id;
            $particular->phone = $request->new_phone;
            $particular->wilaya = $request->new_wilaya;
            $particular->adresse = $request->new_address;
            $particular->save();
            $cart = new Particularcart();
            $cart->particular_id = $particular->id;
            $cart->save();
            $total = 0;
            for($i=0 ; $i<count($request->products); $i++ ){
                $product = Produit::find($request->products[$i]);
                $total =  $total + $request->qtes[$i] * $product->pu_ht;
            }

            $order = new Particularorder();
            $order->particular_id= $particular->id;
            $order->name = $user->name;
            $order->address = $request->new_address;
            $order->wilaya = $request->new_wilaya;
            $order->phone = $request->new_phone;
            $order->status = 1;
            $order->total = $total;
            $order->save();
            $date = Carbon::now()->format('y');
            $order->code = 'mdl'.'-'.$date.'-'.$order->id;
            $order->save();

            for($i=0 ; $i<count($request->products); $i++ ){
                $orderline = new Particularorderline();
                $orderline->particularorder_id = $order->id;
                $orderline->qte = $request->qtes[$i];
                $orderline->product_id = $request->products[$i];
                $product = Produit::find($request->products[$i]);
                $orderline->total = $request->qtes[$i] * $product->pu_ht;
                $orderline->pu = $product->pu_ht;
                $total =  $total + $request->qtes[$i] * $product->pu_ht;
                $orderline->save();
               }

        }

        else{
            $total = 0;
            for($i=0 ; $i<count($request->products); $i++ ){
                $product = Produit::find($request->products[$i]);
                $total =  $total + $request->qtes[$i] * $product->pu_ht;
            }
            $particular = Particulier::find($request->particular);

            $order = new Particularorder();
            $order->particular_id= $request->particular;
            $order->name = $particular->user->name;
            $order->address = $request->address;
            $order->wilaya = $request->wilaya;
            $order->phone = $request->phone;
            $order->status = 1;
            $order->total = $total;
            $order->save();
            $date = Carbon::now()->format('y');
            $order->code = 'mdl'.'-'.$date.'-'.$order->id;
            $order->save();

            for($i=0 ; $i<count($request->products); $i++ ){
                $orderline = new Particularorderline();
                $orderline->particularorder_id = $order->id;
                $orderline->qte = $request->qtes[$i];
                $orderline->product_id = $request->products[$i];
                $product = Produit::find($request->products[$i]);
                $orderline->total = $request->qtes[$i] * $product->pu_ht;
                $orderline->pu = $product->pu_ht;
                $total =  $total + $request->qtes[$i] * $product->pu_ht;
                $orderline->save();
               }
        }

        return redirect('dashboard-admin/particular-orders');
    }

    public function getInformations($id){
        $particular = Particulier::find($id);
        return $particular;
    }

    public function index(){
        $particulars = User::where('type','particulier')->orderBy('created_at','desc')->get();
        return view('admin.particulars',compact('particulars'));
    }
}
