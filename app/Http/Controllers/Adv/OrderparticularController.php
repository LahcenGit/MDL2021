<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Models\Particularorder;
use App\Models\Particularorderline;
use Illuminate\Http\Request;

class OrderparticularController extends Controller
{
    //
    public function index(){
        $orders = Particularorder::orderBy('created_at','desc')->get();
        return view('adv.particular-orders',compact('orders'));
    }
    public function edit($id){
        $order = Particularorder::find($id);
        return view('adv.edit-particular-order',compact('order'));
    }
    public function update($id , Request $request){
        $order = Particularorder::find($id);
        $order->status = $request->status;
        $order->save();
        return redirect('/adv/particular-orders');
    }

    public function detailOrder($id){
        $orderlines = Particularorderline::where('particularorder_id',$id)->get();
        return view('adv.modal-detail-particular-order',compact('orderlines'));
    }
}