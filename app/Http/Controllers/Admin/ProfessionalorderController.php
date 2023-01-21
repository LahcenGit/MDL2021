<?php

namespace App\Http\Controllers;

use App\Models\Professionalorder;
use App\Models\Professionalorderline;
use Illuminate\Http\Request;

class ProfessionalorderController extends Controller
{
    //
    public function index(){
        $orders = Professionalorder::all();
        return view('admin.professional-orders',compact('orders'));
    }
    public function edit($id){
        $order = Professionalorder::find($id);
        return view('admin.edit-professional-order',compact('order'));
    }
    public function update($id , Request $request){
        $order = Professionalorder::find($id);
        $order->status = $request->status;
        $order->save();
        return redirect('/admin/professional-orders');
    }

    public function detailOrder($id){
        $orderlines = Professionalorderline::where('professionalorder_id',$id)->get();
        return view('admin.modal-detail-professional-order',compact('orderlines'));
    }
}