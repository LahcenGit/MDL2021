<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Particulier;
use Illuminate\Http\Request;

class ParticularController extends Controller
{
    //
    public function addOrder(){
        $particulars = Particulier::all();
        return view('admin.add-order-particular',compact('particulars'));
    }
}
