<?php

namespace App\Http\Controllers\LPC;

use App\Http\Controllers\Controller;
use App\Models\Lpc_stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    //
    public function index(){
        $stocks = Lpc_stock::orderBy('created_at','desc')->get();
        return view('lpc.stocks',compact('stocks'));
    }

    public function showModalAddStockInit(){
        return view('lpc.modal-add-stock-intitial');
    }

    public function storestockInitial(Request $request){
        Lpc_stock::create([
            'PDL0' => $request->PDL0,
            'PDL26' => $request->PDL26,
            'film' => $request->film,
            'type' => 0,
            'initial' => 1,
         ]);
         return response()->json(['success' => true, 'message' => 'Form processed successfully']);
    }
}
