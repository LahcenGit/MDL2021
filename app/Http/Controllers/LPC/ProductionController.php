<?php

namespace App\Http\Controllers\LPC;

use App\Http\Controllers\Controller;
use App\Models\Lpc_production;
use App\Models\Lpc_stock;
use Illuminate\Http\Request;

class ProductionController extends Controller
{

    public function index(){
        $productions = Lpc_production::all();
        return view('lpc.productions',compact('productions'));
    }
    public function create(){
        return view('lpc.add-prod');
    }
    public function store(Request $request){

        $request->validate([
            'LPC' => 'required',
        ]);

        $production = new Lpc_production();
        $production->LPC = $request->LPC;
        $production->PDL0 = $request->PDL0;
        $production->PDL26 = $request->PDL26;
        $production->eau = $request->eau;
        $production->ms = $request->ms;
        $production->film = $request->film;
        $production->lvc = $request->lvc;
        $production->save();
        $stock = new Lpc_stock();
        $stock->PDL0 = $request->PDL0;
        $stock->PDL26 = $request->PDL26;
        $stock->film = $request->film;
        $stock->type = 2;
        $stock->initial = 0;
        $stock->save();
        return redirect('milkcheck/lpc/productions');
    }
 }
