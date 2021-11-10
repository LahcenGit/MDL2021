<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achat;
use Carbon\Carbon;

class printerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function achats(){

        $achats = Achat::with('vendeur')
        ->whereMonth('created_at', Carbon::now()->month)
        ->get();
        $countachat = Achat::whereMonth('created_at', Carbon::now()->month)
                        ->count();
        $date =  Carbon::now()->month()->format('m');         
        return view('milkcheck.print-achat',compact('achats','countachat','date'));
    }


    public function vendeurs(){

        $vendeurs = Achat::with('vendeur')
                          ->selectRaw('sum(qte) as qte')
                          ->selectRaw('vendeur_id')
                          ->groupBy('vendeur_id')
                          ->whereMonth('created_at', Carbon::now()->month)
                          ->get();

                  
        return view('milkcheck.print-vendeur',compact('vendeurs'));
    }
}
