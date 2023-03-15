<?php

namespace App\Http\Controllers\Labo;

use App\Http\Controllers\Controller;
use App\Models\Production;
use App\Models\Productionline;
use App\Models\Produit;
use App\Models\Professionalorder;
use App\Models\Professionalorderline;
use App\Models\Professionnel;
use App\Models\Stock;
use Illuminate\Http\Request;

class LaboController extends Controller
{
    //
    public function index(){
        $orders = Professionalorder::where('status',3)->get('id');
        $orderLines = Professionalorderline::whereIn('professionalorder_id',$orders)->get();
        $product_1 = $orderLines->where('product_id',1)->sum('qte');
        $product_2 = $orderLines->where('product_id',2)->sum('qte');
        $product_3 = $orderLines->where('product_id',3)->sum('qte');
        $product_4 = $orderLines->where('product_id',4)->sum('qte');
        $product_5 = $orderLines->where('product_id',5)->sum('qte');
        $product_6 = $orderLines->where('product_id',6)->sum('qte');
        $product_7 = $orderLines->where('product_id',7)->sum('qte');
        $product_8 = $orderLines->where('product_id',8)->sum('qte');
        $product_9 = $orderLines->where('product_id',9)->sum('qte');
        $product_10 = $orderLines->where('product_id',10)->sum('qte');
        $product_11 = $orderLines->where('product_id',11)->sum('qte');
        $product_12 = $orderLines->where('product_id',12)->sum('qte');
        return view('labo.dashboard-labo',compact('orders','product_1','product_2','product_3','product_4','product_5','product_6','product_7','product_8','product_9','product_10','product_11','product_12'));
    }

    public function createProduction(){
     $products = Produit::orderBy('flag','asc')->get();
     return view('labo.add-production',compact('products'));
    }

    public function storeProduction(Request $request){
        $production = new Production();
        $production->save();
        for($i=0 ; $i<count($request->products); $i++){
            //store production
            $productionline = new Productionline();
            $productionline->production_id = $production->id;
            $productionline->product_id = $request->products[$i];
            $productionline->qte = $request->qtes[$i];
            $productionline->save();

            //add in stock
            $stock = new Stock();
            $stock->product_id = $request->products[$i];
            $stock->qte = $request->qtes[$i];
            $stock->type = 'Entre';
            $stock->save();

        }
       return redirect('labo/productions');
    }

    public function productions(){
        $productions = Production::orderBy('created_at','desc')->get();
        return view('labo.productions',compact('productions'));
    }
    public function editProduction($id){
        $production = Production::find($id);
        $productionlines = Productionline::where('production_id',$id)->get();
        $array = array();
        foreach($productionlines as $productionline){
            array_push($array , $productionline->product_id);
        }
        $products = Produit::whereNotIn('id',$array)->orderBy('flag','asc')->get();
        return view('labo.edit-production',compact('production','products','productionlines'));
    }

    public function updateProduction(Request $request ,$id){
        $production = Production::find($id);
        $productionlines = Productionline::where('production_id',$id)->get();
        foreach($productionlines as $productionline){
            $productionline->delete();
        }

        for($i=0 ; $i<count($request->productlines); $i++){
            $productionline = new Productionline();
            $productionline->production_id = $id;
            $productionline->product_id = $request->productlines[$i];
            $productionline->qte = $request->production_qtes[$i];
            $productionline->save();
        }
        for($i=0 ; $i<count($request->products); $i++){
            $productionline = new Productionline();
            $productionline->production_id = $production->id;
            $productionline->product_id = $request->products[$i];
            $productionline->qte = $request->qtes[$i];
            $productionline->save();
        }
       return redirect('labo/productions');
    }
    public function showModalProduction($id){
        $productionlines = Productionline::where('production_id',$id)->get();
        return view('labo.modal-productionlines',compact('productionlines'));
    }

}
