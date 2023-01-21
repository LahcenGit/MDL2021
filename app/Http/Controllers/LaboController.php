<?php

namespace App\Http\Controllers;

use App\Models\Professionalorder;
use Illuminate\Http\Request;

class LaboController extends Controller
{
    //
    public function index(){
        $orders = Professionalorder::where('status',3)->get();
        return view('labo.dashboard-labo',compact('orders'));
    }
}
