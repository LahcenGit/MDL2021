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
        $orderlines = Particularorderline::where('particularorder_id',$id)->get();
        $order = Particularorder::find($id);
        return view('particulier.order-lines',compact('orderlines','order'));
    }


    public function wilayaCost($name,$total){
        if($name == "Alger"){
            $total = number_format($total+500,2);
            $coast = 500;
            return response()->json([
                'total' => $total,
                'coast' => $coast
            ]);
        }
        if($name == "Oran"){
            $total = number_format($total+300,2);
            $coast = 300;
            return response()->json([
                'total' => $total,
                'coast' => $coast
            ]);
        }
        if($name == "Sba"){
            $total = number_format($total+200,2);
            $coast = 200;
            return response()->json([
                'total' => $total,
                'coast' => $coast
            ]);
        }
    }
}
