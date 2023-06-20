<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Professionalorder;
use App\Models\Professionalorderline;
use App\Models\Professionnel;
use App\Models\Tarification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IcecreamorderController extends Controller
{
    public function create(){
        $products = Produit::where('categorie_id',3)->get();
        $professionals = Professionnel::all();
        $date = Carbon::now()->format('Y-m-d');
        return view('adv.add-ice-cream-order',compact('products','professionals','date'));
    }
    public function store(Request $request){
        $professional = Professionnel::find($request->professional);
        $total = 0;
        $date = Carbon::now()->format('y');
        $order = new Professionalorder();
        $order->professional_id = $professional->id;
        $order->status = 1;
        $order->created_at = $request->date;
        $order->note = $request->note;
        $order->save();
        for($i=0 ; $i<count($request->products); $i++ ){
            $orderline = new Professionalorderline();
            $orderline->professionalorder_id = $order->id;
            $orderline->qte = $request->qtes[$i];
            $orderline->product_id = $request->products[$i];
            $tarification = Tarification::where('product_id',$request->products[$i])->first();
             if($request->check_price){
                $orderline->total = $request->qtes[$i] * $tarification->price_two;
                $orderline->pu = $tarification->price_two;
                $total = $total +  $request->qtes[$i] * $tarification->price_two;
             }
             else{
                $orderline->total = $request->qtes[$i] * $tarification->price_one;
                $orderline->pu = $tarification->price_one;
                $total = $total +  $request->qtes[$i] * $tarification->price_one;
             }
            $orderline->save();
        }
        $total_order = Professionalorderline::where('professionalorder_id',$order->id)->sum('total');
        $order->total = $total_order;
        $order->code = 'mdl'.'-'.$date.'-'.$order->id;
        $order->save();

        return redirect('adv/professional-orders');
    }
}
