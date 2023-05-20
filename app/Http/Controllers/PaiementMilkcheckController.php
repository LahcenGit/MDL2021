<?php

namespace App\Http\Controllers;

use App\Models\Breeder;
use App\Models\Lineachat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use NumberFormatter;

class PaiementMilkcheckController extends Controller
{

    public function indexEtat(){

        $breeders = Breeder::orderBy('created_at','desc')->get();
        return view('milkcheck.etat-paiements',compact('breeders'));
    }


    public function etatSchow($id){

        $qteglobal = 0 ;
        $i = 0 ;
        $price = 0 ;

        $breeder = Breeder::find($id);

        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->translatedFormat('F');

        $lineachats = Lineachat::whereMonth('created_at', Carbon::now()->month)
        ->where('breeder_id',$id)
        ->get();

        foreach($lineachats as $lineachat){
            $i++;
            $qteglobal = $qteglobal + $lineachat->qte;
            $price = $price + $lineachat->price;
        }

        $pricemoy = $price/$i;





        //calcule le bon total on le divise sur deux partie

        $total = $pricemoy * $qteglobal;
        $total_part1 = (int)$total;

        if($total - $total_part1 < 10 ){
            $total_part2 = ($total - $total_part1)*100;
        }
        else{
            $total_part2 = ($total - $total_part1)*10;
        }

        $total_part2 = (int)($total_part2);

        $total_part1 = (string)$total_part1;
        $total_part2 = (string)$total_part2;

        $letter = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
        $total_part1 = $letter->format($total_part1);
        $total_part2 = $letter->format($total_part2);




        return view('milkcheck.etat-breeder',compact('lineachats','breeder','year','month','price','qteglobal','pricemoy','total_part1','total_part2'));
    }
}
