<?php

namespace App\Http\Controllers;

use App\Models\Vendeur;
use App\Models\User;
use Illuminate\Http\Request;

class VendeurController extends Controller
{
    //
    public function index(){
        $vendeurs = Vendeur::all();
        return view('milkcheck.vendeurs',compact('vendeurs'));
    }
    public function create(){
        return view('milkcheck.add-vendeur');
    }
    public function store(Request $request){
        $request->validate([
           
            'email' => 'required',
            'name' => 'required',
            'numero' => 'required',
            'date' => 'required',
            
        ]);

        $user = new User();
        $user->email = 'NULL';
        $user->password ='NULL';
        $user->name = 'NULL';
       
        $user->save();
        $vendeur = new Vendeur();
        $vendeur->user_id = $user->id;
        $vendeur->name = $request->name;
        $vendeur->email = $request->email;
        $vendeur->n_agrement = $request->numero;
        $vendeur->date = $request->date;
        $vendeur->save();
        return redirect('milkcheck/vendeurs');
    }
        public function edit($id){
            $vendeur = Vendeur::find($id);
            return view('milkcheck.edit-vendeur',compact('vendeur'));            
        }
        public function update(Request $request,$id){
            $vendeur = Vendeur::find($id);
            $vendeur->name = $request->name;
            $vendeur->email = $request->email;
            $vendeur->n_agrement = $request->numero;
            $vendeur->date = $request->date;
            $vendeur->save();
               return redirect('milkcheck/vendeurs');
        }

        public function destroy($id){
            $vendeur = Vendeur::find($id);
            $vendeur->delete();
            return redirect('milkcheck/vendeurs')->with('success','Vendeur supprimé :)');
        }
    
}
