<?php

namespace App\Http\Controllers;

use App\Models\Productfabrication;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductfabricationController extends Controller
{
    //
    public function index(){
        $fabrications = Productfabrication::orderBy('created_at','desc')->get();
        return view('milkcheck.product-fabrications',compact('fabrications'));
    }
    public function create(){
        $date = Carbon::today()->format('Y-m-d');
        return view('milkcheck.add-product-fabrication',compact('date'));
    }
    public function store(Request $request){
        $fabrication = new Productfabrication();
        $fabrication->designation = 'Crème brute';
        $fabrication->qte = $request->qte;
        $fabrication->type = 1;
        $fabrication->created_at = $request->date;
        $fabrication->save();
        return redirect('milkcheck/product-fabrication');
    }
    public function edit($id){
        $fabrication = Productfabrication::find($id);

        return view('milkcheck.edit-fabrication-product',compact('fabrication'));
    }
    public function update(Request $request , $id){
        $fabrication = Productfabrication::find($id);
        $fabrication->designation = 'Crème brute';
        $fabrication->qte = $request->qte;
        $fabrication->type = 1;
        $fabrication->created_at = $request->date;
        $fabrication->save();
        return redirect('milkcheck/product-fabrication');
    }
}
