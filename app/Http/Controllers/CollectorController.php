<?php

namespace App\Http\Controllers;

use App\Models\Collector;
use App\Models\User;
use Illuminate\Http\Request;

class CollectorController extends Controller
{
    public function index(){
        $collectors = collector::all();
        return view('milkcheck.collectors',compact('collectors'));
    }
    public function create(){
        return view('milkcheck.add-collector');
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'n_agrement' => 'required',
            'delivry_date' => 'required',
            'expiration_date' => 'required',
        ]);
        

        $user = new User();
        $user->email = null;
        $user->password = null;
        $user->name = $request->name;
        $user->save();

        $collector = new Collector();
        $collector->user_id = $user->id;
        $collector->name = $request->name;
        $collector->email = $request->email;
        $collector->phone = $request->phone;
        $collector->n_agrement = $request->n_agrement;
        $collector->delivry_date = $request->delivry_date;
        $collector->expiration_date = $request->expiration_date;
        $collector->save();


        return redirect('milkcheck/collectors');
    }


        public function edit($id){
            $collector = Collector::find($id);
            return view('milkcheck.edit-collector',compact('collector'));            
        }


        public function update(Request $request,$id){
            $collector = Collector::find($id);
            $collector->name = $request->name;
            $collector->telephone = $request->telephone;
            $collector->email = $request->email;
            $collector->n_agrement = $request->numero;
            $collector->date_expedition = $request->date_expedition;
            $collector->date_expiration = $request->date_expiration;
            $collector->save();
               return redirect('milkcheck/collectors');
        }

        public function destroy($id){
            $collector = Collector::find($id);
            $collector->delete();
            return redirect('milkcheck/collectors')->with('success','collector supprimé :)');
        }
}
