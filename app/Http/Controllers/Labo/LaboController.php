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
        $resultats = Stock::selectRaw('product_id, SUM(CASE WHEN type = "Entre" THEN qte ELSE 0 END) as entree , SUM(CASE WHEN type = "sortie" THEN qte ELSE 0 END) as sortie ,  SUM(CASE WHEN type = "Entre" THEN qte ELSE 0 END) - SUM(CASE WHEN type = "sortie" THEN qte ELSE 0 END) as stock')
        ->groupBy('product_id')
        ->where('type', 'Entre')
        ->orWhere('type', 'sortie')
        ->get();
        return view('labo.dashboard-labo',compact('resultats'));
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
