<?php

namespace App\Http\Controllers\Particular;

use App\Http\Controllers\Controller;
use App\Models\Particularorder;
use App\Models\Particularorderline;
use App\Models\Particulier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppParticularController extends Controller
{
    //
    public function index(){
        $orders = Particularorder::all();
        return view('particulier.app-particular',compact('orders'));
    }

    public function orderLines($id){
        $particular = Particulier::where('user_id',Auth::user()->id)->first();
        $orderlines = Particularorderline::where('particularorder_id',$id)->get();
        $total = Particularorderline::where('particularorder_id',$id)->sum('total');
        return view('particulier.order-lines',compact('orderlines','total'));
    }
}
