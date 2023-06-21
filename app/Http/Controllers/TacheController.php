<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    //
    public function index(){
        $taches = Tache::orderBy('created_at','desc')->get();
        return view('milkcheck.taches',compact('taches'));
    }
    public function create(){
        return view('milkcheck.add-tache');
    }
    public function store(Request $request){
        $tache = new Tache();
        $tache->tache = $request->tache;
        $tache->description = $request->description;
        $tache->save();
        return redirect('milkcheck/taches');
    }
}
