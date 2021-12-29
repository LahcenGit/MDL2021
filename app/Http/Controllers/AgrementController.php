<?php

namespace App\Http\Controllers;

use App\Models\Vendeur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgrementController extends Controller
{
    //
    public function index(){
        $this->authorize("agrement.viewAny");
        $vendeurs = Vendeur::all();
       
        return view('milkcheck.liste-agrements',compact('vendeurs'));
    }
}
