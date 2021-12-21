<?php

namespace App\Http\Controllers;

use App\Models\Vendeur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgrementController extends Controller
{
    //
    public function index(){
        $vendeurs = Vendeur::all();
       
        return view('milkcheck.agrements',compact('vendeurs'));
    }
}
