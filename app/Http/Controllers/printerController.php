<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achat;
use Carbon\Carbon;

class printerController extends Controller
{
    //
    public function Achats(){

        $achats = Achat::with('vendeur')
        ->whereMonth('created_at', Carbon::now()->month)
        ->get();
        return view('milkcheck.print-achat',compact('achats'));
    }
}
