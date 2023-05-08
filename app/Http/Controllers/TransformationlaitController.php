<?php

namespace App\Http\Controllers;

use App\Models\Stocklait;
use App\Models\Transformationlait;
use Doctrine\Inflector\Rules\Transformation;
use Illuminate\Http\Request;

class TransformationlaitController extends Controller
{
    //
    public function index(){
        $transformations = Transformationlait::orderBy('created_at','desc')->get();
        return view('milkcheck.transformations-lait',compact('transformations'));
    }
    public function create(){
        $qte_entree = Stocklait::where('type','Entree')->sum('qte');
        $qte_sortie = Stocklait::where('type','Sortie')->sum('qte');
        $qte = $qte_entree - $qte_sortie;
        return view('milkcheck.add-transformation-lait',compact('qte'));
    }

    public function store(Request $request){
        $transformation = new Transformationlait();
        $transformation->qte_used = $request->qte_used;
        $transformation->destination = $request->destination;
        $transformation->result = $request->result;
        $transformation->save();
        $stock = new Stocklait();
        $stock->qte = $request->qte_used;
        $stock->type = 'Sortie';
        $transformation->stocklaits()->save($stock);
        return redirect('milkcheck/transformation-milk');

    }

    public function edit($id){
        $transformation = Transformationlait::find($id);
        $qte_entree = Stocklait::where('type','Entree')->sum('qte');
        $qte_sortie = Stocklait::where('type','Sortie')->sum('qte');
        $qte = $qte_entree - $qte_sortie;
        return view('milkcheck.edit-transformation-lait',compact('transformation','qte'));
    }

    public function update(Request $request , $id){
        $transformation = Transformationlait::find($id);
        $transformation->qte_used = $request->qte_used;
        $transformation->destination = $request->destination;
        $transformation->result = $request->result;
        $transformation->save();
        foreach($transformation->stocklaits as $stock){
            $stock->delete();
        }
        $stock = new Stocklait();
        $stock->qte = $request->qte_used;
        $stock->type = 'Sortie';
        $transformation->stocklaits()->save($stock);
        return redirect('milkcheck/transformation-milk');
    }
}
