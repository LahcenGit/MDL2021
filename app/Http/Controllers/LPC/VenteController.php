<?php

namespace App\Http\Controllers\LPC;

use App\Http\Controllers\Controller;
use App\Models\Lpc_client;
use App\Models\Lpc_vente;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    public function index(){
        $ventes = Lpc_vente::all();
        return view('lpc.ventes',compact('ventes'));
    }
    public function create(){
        $clients = Lpc_client::all();
        return view('lpc.add-vente',compact('clients'));
    }
    public function store(Request $request){

        $request->validate([
            'qte' => 'required',
        ]);

        $collector = new Lpc_vente();
        $collector->lpc_client_id = $request->client;
        $collector->qte = $request->qte;
        $collector->price = 21;
        $collector->total = $collector->qte * 21;
        $collector->save();

        return redirect('milkcheck/lpc/ventes');
    }
}
