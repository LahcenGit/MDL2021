<?php

namespace App\Http\Controllers;

use App\Models\Citie;
use App\Models\Commune;
use App\Models\Wilaya;
use App\Models\Eleveur;
use Illuminate\Http\Request;

class EleveurController extends Controller
{
    //
    public function create(){
        $wilayas = Citie::distinct('wilaya_name_ascii')->get();
       
        return view('eleveur',compact('wilayas'));
    }

    public function store(Request $request){
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'wilaya' => ['required', 'string', 'max:255'],
            'commune' => ['required', 'string', 'max:255'],
            'check' => ['required', 'string', 'max:255'],
            
   
           ]);
        $eleveur = new Eleveur();
        $eleveur->nom = $request->nom;
        $eleveur->prenom = $request->prenom;
        $eleveur->type = $request->type;
        $eleveur->wilaya = $request->wilaya;
        $eleveur->commune = $request->commune;
        $eleveur->check = $request->check;
        $eleveur->save();

    }

    public function selectCommune($name){
        $communes = Citie::where('wilaya_name_ascii',$name)->get();
        return $communes;
    }
}
