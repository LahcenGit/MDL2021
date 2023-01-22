<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wilaya;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    //
    public function create(){
     $wilayas = Wilaya::all();
     return view('admin.add-professional',compact('wilayas'));
    }
}
