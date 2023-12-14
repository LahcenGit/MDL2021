<?php

namespace App\Http\Controllers\LPC;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function index(){
        return view('lpc.generate-repport');
    }

    public function generateRepport(Request $request)
    {
        $mois =Carbon::now()->month;
        $product = $request->input('product');
        // Générer le rapport mensuel pour le produit sélectionné
        $repport = DB::table('lpc_stocks')
                ->select(
                    'created_at as date',
                    DB::raw('SUM(CASE WHEN type = 0 THEN ' . $product . ' END) as qte_initial_total'),
                    DB::raw('SUM(CASE WHEN type = 1 THEN ' . $product . ' END) as entree_total'),
                    DB::raw('SUM(CASE WHEN type = 2 THEN ' . $product . ' END) as sortie_total'),
                    DB::raw('SUM(CASE WHEN type = 0 THEN ' . $product . ' END) + SUM(CASE WHEN type = 1 THEN ' . $product . ' END) - SUM(CASE WHEN type = 2 THEN ' . $product . ' END) as stock_final')
                )
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', $mois)
                ->groupBy('created_at')
                ->orderBy('created_at')
                ->get();

        return view('lpc.repport',compact('repport'));
    }



}
