<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Particularorder;
use App\Models\Productionline;
use App\Models\Professionalorder;
use App\Models\Visit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard-admin');
    }

    public function advOrders(){
        $professional_orders = Professionalorder::orderBy('created_at','desc')->get();
        $particulars_orders = Particularorder::orderBy('created_at','desc')->get();
        return view('admin.adv',compact('professional_orders','particulars_orders'));
    }
    public function commercial(){
        $orders = Professionalorder::where('commercial_id','!=',Null)->orderBy('created_at','desc')->get();
        $visits = Visit::orderBy('created_at','desc')->get();
        return view('admin.commercial',compact('orders','visits'));
    }
    public function production(){
        $productionlines = Productionline::orderBy('created_at','desc')->get();
        return view('admin.labo',compact('productionlines'));
    }
}
