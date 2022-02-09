<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Analyse;
use App\Models\Lineachat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Group;

class MilkchecController extends Controller
{


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
        $achats = Achat::with('collector')
                         ->whereMonth('created_at', Carbon::now()->month)
                         ->limit(5)
                         ->get(); 

       
        $top_breeders = Lineachat::whereMonth('lineachats.created_at', Carbon::now()->month)
                           ->join('analyses','analyses.achat_id', '=', 'lineachats.achat_id')
                           ->selectRaw('breeder_id')
                           ->groupBy('breeder_id')
                           ->selectRaw('avg(d) as densite')
                           ->selectRaw('avg(f) as fat')
                           ->selectRaw('avg(p) as p')
                           ->selectRaw('sum(qte) as qte')
                           ->orderBy('densite','desc')
                           ->limit(5)
                           ->get();

        $top_qte_breeders = Lineachat::whereMonth('lineachats.created_at', Carbon::now()->month)
                              ->selectRaw('breeder_id')
                              ->groupBy('breeder_id')
                              ->selectRaw('sum(qte) as qte')
                              ->orderBy('qte','desc')
                              ->limit(5)
                              ->get();
                   
        
        return view('milkcheck.milkcheck',compact('lait','fromage','achat','randement','achats','top_breeders','top_qte_breeders'));
    }





    public function dataf(){

       

        $analyses = Analyse::
                    whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SATURDAY),Carbon::now()->endOfWeek(Carbon::THURSDAY)])
                    ->selectRaw(DB::raw('DATE_FORMAT(created_at, "%d") as date'))
                    ->groupBy('date')
                    ->selectRaw('avg(f) as fat')
                    ->get();


        return $analyses;


    }

    public function datad(){

       

        $analyses = Analyse::
                    whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SATURDAY),Carbon::now()->endOfWeek(Carbon::THURSDAY)])
                    ->selectRaw(DB::raw('DATE_FORMAT(created_at, "%d") as date'))
                    ->groupBy('date')
                    ->selectRaw('avg(d) as densite')
                    ->get();


        return $analyses;


    }
    public function datap(){

       

        $analyses = Analyse::
                    whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SATURDAY),Carbon::now()->endOfWeek(Carbon::THURSDAY)])
                    ->selectRaw(DB::raw('DATE_FORMAT(created_at, "%d") as date'))
                    ->groupBy('date')
                    ->selectRaw('avg(p) as p')
                    ->get();


        return $analyses;


    }
}
