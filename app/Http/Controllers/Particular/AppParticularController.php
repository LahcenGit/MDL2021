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
    public function __construct()
    {
        $this->middleware('professionalParticularAuth');
    }
    public function index(){
        $user = Auth::user();
        $particular = Particulier::where('user_id',$user->id)->first();
        $orders = Particularorder::where('particular_id',$particular->id)->orderBy('created_at','desc')->get();
        return view('particulier.app-particular',compact('orders'));
    }

    public function orderLines($id){
        $particular = Particulier::where('user_id',Auth::user()->id)->first();
        $orderlines = Particularorderline::where('particularorder_id',$id)->get();
        $total = Particularorderline::where('particularorder_id',$id)->sum('total');
        $order = Particularorder::find($id);
        $code = $order->code;
        return view('particulier.order-lines',compact('orderlines','total','code'));
    }
}
