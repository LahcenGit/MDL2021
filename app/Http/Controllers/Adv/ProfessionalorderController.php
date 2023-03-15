<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Models\Professionalorder;
use App\Models\Professionalorderline;
use Illuminate\Http\Request;

class ProfessionalorderController extends Controller
{
    //
    public function index(){
        $orders = Professionalorder::orderBy('created_at','desc')->get();
        return view('adv.professional-orders',compact('orders'));
    }
    public function edit($id){
        $order = Professionalorder::find($id);
        return view('adv.edit-professional-order',compact('order'));
    }
    public function update($id , Request $request){
        $order = Professionalorder::find($id);
        $order->status = $request->status;
        $order->save();
        return redirect('/adv/professional-orders');
    }

    public function detailOrder($id){
        $orderlines = Professionalorderline::where('professionalorder_id',$id)->get();
        return view('adv.modal-detail-professional-order',compact('orderlines'));
    }
}
