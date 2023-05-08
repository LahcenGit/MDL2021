<?php

namespace App\Http\Controllers;

use App\Models\Productfabrication;
use Illuminate\Http\Request;

class ProductfabricationController extends Controller
{
    //
    public function index(){
        $fabrications = Productfabrication::orderBy('created_at','desc')->get();
        return view('milkcheck.product-fabrications',compact('fabrications'));
    }
    public function create(){
        return view('milkcheck.add-product-fabrication');
    }
    public function store(Request $request){
        $fabrication = new Productfabrication();
        $fabrication->designation = 'Crème brute';
        $fabrication->qte = $request->qte;
        $fabrication->type = 1;
        $fabrication->save();
        return redirect('milkcheck/product-fabrication');
    }
}
