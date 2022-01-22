<?php

namespace App\Http\Controllers;

use App\Models\Breeder;
use App\Models\Collector;
use App\Models\Lineachat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){

        return view('milkcheck.report');

    }


    public function getType($type){
        if($type == "collector"){
            return $collectors = Collector::all();
        }
        if($type== "breeder"){
            return $breeders = Breeder::all();
        }

    }

    public function reportDetail(Request $request){
        $qteglobal = 0 ;
        $i = 0 ;
        $price = 0 ;

        if($request->type == "breeder"){
            if($request->date=="m"){

                $date = Carbon::now()->format('M-Y');
                $breeder = Breeder::find($request->id);
                $lineachats = Lineachat::whereMonth('created_at', Carbon::now()->month)
                             ->where('breeder_id',$request->id)
                             ->get();
            }
        }

        foreach($lineachats as $lineachat){
            $i++;
            $qteglobal = $qteglobal + $lineachat->qte; 
            $price = $price + $lineachat->price; 
        }

        $pricemoy = $price/$i;

    

        return view('milkcheck.report-detail',compact('lineachats','date','breeder','pricemoy','qteglobal'));

    }
}
