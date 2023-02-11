<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wilaya;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    //
    public function create(){
     $wilayas = Wilaya::all();
     return view('admin.add-professional',compact('wilayas'));
    }

    public function index(){
        $professionals = User::where('type','professionnel')->orderBy('created_at','desc')->get();
        return view('admin.professionals',compact('professionals'));
    }
}
