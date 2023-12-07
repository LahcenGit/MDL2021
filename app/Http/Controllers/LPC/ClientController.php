<?php

namespace App\Http\Controllers\LPC;

use App\Http\Controllers\Controller;
use App\Models\Lpc_client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function index(){
        $clients = Lpc_client::all();
        return view('lpc.clients',compact('clients'));
    }
    public function create(){
        return view('lpc.add-client');
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
        ]);

        $collector = new Lpc_client();
        $collector->name = $request->name;
        $collector->email = $request->email;
        $collector->phone = $request->phone;
        $collector->save();

        return redirect('milkcheck/lpc/clients');
    }

}
