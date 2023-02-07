<?php

namespace App\Http\Controllers\Particular;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ParticularorderController extends Controller
{
    public function __construct()
    {
        $this->middleware('professionalParticularAuth');
    }

    public function index(){
        $products = Produit::where('type','particular')->orderBy('flag','asc')->get();
        $error = null;
        return view('particulier.order-particular',compact('products','error'));
    }
}
