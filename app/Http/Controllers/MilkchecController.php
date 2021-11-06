<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Analyse;
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

    public function dataf(){
        $i = 0;
        $results = [];
        $tab = [];
     
        $analyses = Analyse::whereMonth('created_at', Carbon::now()->month)
                        ->groupBy(function($item)
                        {
                        return $item->created_at->format('d-M-y');
                        })
                        ->select('f')
                        ->get();

        $anal = Analyse::latest()->get()

        ->select('f')
        ->select('created_at')
                        ->groupBy(function($item)
                        {
                        return $item->created_at->format('d-M-y');
                        });
                        

                dd( $anal);

                      
        foreach($analyses as $analyse){
            $tab1[$i] = $analyse->f ;
            $tab2[$i] = $analyse->created_at->format('d') ;
            $i++;

        }

        $results = [
            'fats' => $tab1,
            'days' => $tab2,
        ];
        



        return $results;
    }
}
