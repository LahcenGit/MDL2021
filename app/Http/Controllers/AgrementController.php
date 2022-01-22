<?php

namespace App\Http\Controllers;

use App\Models\Breeder;
use App\Models\Collector;
use App\Models\Vendeur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgrementController extends Controller
{
    //
    public function collectorsAccord(){
        $collectors = Collector::all();
        return view('milkcheck.collectors-accord',compact('collectors'));
    }
    public function breedersAccord(){
        $breeders = Breeder::all();
       
        return view('milkcheck.breeders-accord',compact('breeders'));
    }
}
