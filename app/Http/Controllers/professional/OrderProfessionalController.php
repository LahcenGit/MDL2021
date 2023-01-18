<?php

namespace App\Http\Controllers\professional;

use App\Http\Controllers\Controller;
use App\Models\Wilaya;
use Illuminate\Http\Request;

class OrderProfessionalController extends Controller
{
    public function index(){
        $wilayas = Wilaya::all();
        return view('professionel.order-pro',compact('wilayas'));
    }
}
