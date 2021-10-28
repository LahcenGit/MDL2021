<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Analyse;
use App\Models\Vendeur;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    //
    public function index(){
        $achats = Achat::with('vendeur')->get();
        return view('milkcheck.achats',compact('achats'));        
    }
    public function create(){
        $vendeurs = Vendeur::all();
        return view('milkcheck.add-achat',compact('vendeurs'));
    }
    public function store(Request $request){
        $request->validate([
           
            'qte' => 'required',
            'vendeur' => 'required',
            'destination' => 'required',
            'qteF' => 'required',
            'qteD' => 'required',
            'qteC' => 'required',
            'qteS' => 'required',
            'qteP' => 'required',
            'qteW' => 'required',
            'qteL' => 'required',
            'qteT' => 'required',
            'qteFP' => 'required',
            

          
          ]);
        $achat = new Achat();
        $achat->vendeur_id = $request->vendeur;
        $achat->qte = $request->qte;
        $achat->destination = $request->destination;
        $achat->save();

        $analyse = new Analyse();
        $analyse->achat_id = $achat->id;
        $analyse->f = $request->qteF;
        $analyse->d = $request->qteD;
        $analyse->c = $request->qteC;
        $analyse->s = $request->qteS;
        $analyse->p = $request->qteP;
        $analyse->w = $request->qteW;
        $analyse->l = $request->qteL;
        $analyse->t = $request->qteT;
        $analyse->fp =$request->qteFP;
        $analyse->save();
        return redirect('milkchec/achats');
    }

    public function showAchat($id){
        $achat = Achat::find($id);
        $analyse = $achat->analyse;
        
        return view('milkcheck.modal-achat',compact('analyse','achat'));
    }
}
