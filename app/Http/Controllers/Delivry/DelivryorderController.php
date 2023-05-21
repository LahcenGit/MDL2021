<?php

namespace App\Http\Controllers\Delivry;

use App\Http\Controllers\Controller;
use App\Models\Delivryorder;
use App\Models\Professionalorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DelivryorderController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $orders = Delivryorder::where('user_id',Auth::user()->id)->get();

        return view('delivry.dashboard-delivry',compact('orders'));
    }


    public function confirmDelivery($id){

        $order_delivery = Delivryorder::find($id);
        $order_delivery->status = 1 ;
        $order_delivery->save();
        $order = Professionalorder::find($order_delivery->professionalorder_id);
        $order->status = 4;
        $order->save();

        return redirect('/delivry');
    }
}
