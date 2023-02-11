<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Particulier;
use App\Models\Produit;
use Illuminate\Http\Request;

class ParticularController extends Controller
{
    //
    public function addOrder(){
        $particulars = Particulier::all();
        $products = Produit::where('type','particular')->orderBy('flag','asc')->get();
        return view('admin.add-order-particular',compact('particulars','products'));
    }

    public function getInformations($id){
        $particular = Particulier::find($id);
        return $particular;
    }
}
