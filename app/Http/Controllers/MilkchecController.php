<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MilkchecController extends Controller
{
    //
    public function index(){
        $lait = Achat::where('destination','=','lait')
                       ->selectRaw('sum(qte) as q')
                       ->whereMonth('created_at', Carbon::now()->month)
                       ->first();
        $fromage = Achat::where('destination','=','fromage')
                       ->selectRaw('sum(qte) as qt')
                       ->whereMonth('created_at', Carbon::now()->month)
                       ->first();
        
        $achat = Achat::whereMonth('created_at', Carbon::now()->month)
                        ->count();

        $randement = $fromage->qt/10;
        $achats = Achat::with('vendeur')
                         ->whereMonth('created_at', Carbon::now()->month)
                         ->limit(5)
                         ->get();

        
        return view('milkcheck.milkcheck',compact('lait','fromage','achat','randement','achats'));
    }
}
