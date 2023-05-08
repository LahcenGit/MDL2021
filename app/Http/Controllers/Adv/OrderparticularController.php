<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Models\Particularcartline;
use App\Models\Particularorder;
use App\Models\Particularorderline;
use App\Models\Particulier;
use App\Models\Produit;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderparticularController extends Controller
{
    //
    public function index(){
        $orders = Particularorder::orderBy('created_at','desc')->get();
        return view('adv.particular-orders',compact('orders'));
    }
    public function edit($id){
        $order = Particularorder::find($id);
        $particulars = Particulier::orderBy('created_at','desc')->get();

        $orderlines = Particularorderline::where('particularorder_id',$id)->get();
        $array = array();
        foreach($orderlines as $orderline){
            array_push($array , $orderline->product_id);
        }
        $products = Produit::whereNotIn('id',$array)->orderBy('flag','asc')->get();
        return view('adv.edit-particular-order',compact('order','orderlines','products','particulars'));
    }
    public function update($id , Request $request){
        $order = Particularorder::find($id);
        $particular = Particulier::find($request->particular);
        $orderlines = Particularorderline::where('particularorder_id',$id)->get();
        if($request->status == 3){
            $orderlines = Particularorderline::where('particularorder_id',$id)->get();
            foreach($orderlines as $orderline){
                $stock = new Stock();
                $stock->product_id = $orderline->product_id;
                $stock->qte = $orderline->qte;
                $stock->type = 'sortie';
                $order->stocks()->save($stock);
            }
        }
        foreach($orderlines as $orderline){
            $orderline->delete();
        }
        $total = 0;

            $order->particular_id= $request->particular;
            $order->status = $request->status;

            $order->save();
            if($request->products_order){
                for($i=0 ; $i<count($request->products_order); $i++ ){
                        $orderline = new Particularorderline();
                        $orderline->particularorder_id = $order->id;
                        $orderline->qte = $request->qtes_order[$i];
                        $orderline->product_id = $request->products_order[$i];
                        $product = Produit::find($request->products_order[$i]);
                        $orderline->total = $request->qtes_order[$i] * $product->pu_ht;
                        $orderline->pu = $product->pu_ht;
                        $total =  $total + $request->qtes_order[$i] * $product->pu_ht;
                        $orderline->save();
                    }
                }
            if($request->products){
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
            $total_order = Particularorderline::where('particularorder_id',$order->id)->sum('total');
            $order->total = $total_order;
            $order->save();
        return redirect('/adv/particular-orders');
    }

    public function detailOrder($id){
        $orderlines = Particularorderline::where('particularorder_id',$id)->get();
        return view('adv.modal-detail-particular-order',compact('orderlines'));
    }
}
