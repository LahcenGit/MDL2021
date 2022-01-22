<?php

namespace App\Http\Controllers;

use App\Models\Breeder;
use App\Models\Collector;
use App\Models\User;
use Illuminate\Http\Request;

class BreederController extends Controller
{

    public function index(){
        $breeders = Breeder::all();
        return view('milkcheck.breeders',compact('breeders'));

    }


    public function create(){
        $collectors = Collector::all();
        return view('milkcheck.add-breeder',compact('collectors'));
    }


    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'collector' => 'required',
        ]);


        $breeder = new Breeder();
        $breeder->collector_id = $request->collector;
        $breeder->name = $request->name;
        $breeder->email = $request->email;
        $breeder->phone = $request->phone;

        $breeder->n_agrement = $request->n_agrement;
        $breeder->delivry_date = $request->delivry_date;
        $breeder->expiration_date = $request->expiration_date;
        $breeder->save();


        return redirect('milkcheck/breeders');
    }

}
