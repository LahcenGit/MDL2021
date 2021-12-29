<?php

namespace App\Http\Controllers;

use App\Models\Vendeur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VendeurController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $vendeurs = Vendeur::all();
        $this->authorize("vendeur.viewAny");
        return view('milkcheck.vendeurs',compact('vendeurs'));
    }
    public function create(){
        $this->authorize("vendeur.create");
        return view('milkcheck.add-vendeur');
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'numero' => 'required',
            'date_expedition' => 'required',
            'date_expiration' => 'required',
        ]);
        

        $user = new User();
        $user->email = null;
        $user->password = null;
        $user->name = $request->name;
        $user->save();

        $vendeur = new Vendeur();
        $vendeur->user_id = $user->id;
        $vendeur->name = $request->name;
        $vendeur->email = $request->email;
        $vendeur->telephone = $request->telephone;
        $vendeur->n_agrement = $request->numero;
        $vendeur->date_expedition = $request->date_expedition;
        $vendeur->date_expiration = $request->date_expiration;
        $vendeur->save();


        return redirect('milkcheck/vendeurs');
    }


        public function edit($id){
            $vendeur = Vendeur::find($id);
            $this->authorize("vendeur.update",$vendeur);
            return view('milkcheck.edit-vendeur',compact('vendeur'));            
        }


        public function update(Request $request,$id){
            $vendeur = Vendeur::find($id);
            $this->authorize("vendeur.update",$vendeur);
            $vendeur->name = $request->name;
            $vendeur->telephone = $request->telephone;
            $vendeur->email = $request->email;
            $vendeur->n_agrement = $request->numero;
            $vendeur->date_expedition = $request->date_expedition;
            $vendeur->date_expiration = $request->date_expiration;
            $vendeur->save();
               return redirect('milkcheck/vendeurs');
        }

        public function destroy($id){
            $vendeur = Vendeur::find($id);
            $this->authorize("vendeur.delete",$vendeur);
            $vendeur->delete();
            return redirect('milkcheck/vendeurs')->with('success','Vendeur supprimé :)');
        }
    
}
