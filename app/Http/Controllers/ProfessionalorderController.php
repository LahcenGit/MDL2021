<?php

namespace App\Http\Controllers;

use App\Models\Professionalorder;
use Illuminate\Http\Request;

class ProfessionalorderController extends Controller
{
    //
    public function index(){
        $orders = Professionalorder::all();
        return view('admin.professional-orders',compact('orders'));
    }
}
