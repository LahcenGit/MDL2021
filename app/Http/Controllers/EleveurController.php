<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Wilaya;
use App\Models\Eleveur;
use Illuminate\Http\Request;

class EleveurController extends Controller
{
    //
    public function create(){
        $wilayas = Wilaya::all();
        $communes = Commune::all();
        return view('eleveur',compact('wialayas','communes'));
    }

    public function store(Request $request){
        $eleveur = new Eleveur();
        $eleveur->nom = $request->nom;
        $eleveur->prenom = $request->prenom;
        $eleveur->type = $request->type;
        $eleveur->wilaya = $request->wilaya;
        $eleveur->commune = $request->commune;
        $eleveur->check = $request->check;
        $eleveur->save();

    }
}
