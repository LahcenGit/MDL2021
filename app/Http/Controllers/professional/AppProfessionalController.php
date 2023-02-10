<?php

namespace App\Http\Controllers\professional;

use App\Http\Controllers\Controller;
use App\Models\Professionalorder;
use App\Models\Professionalorderline;
use App\Models\Professionnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppProfessionalController extends Controller
{

    public function index(){
        $professional = Professionnel::where('user_id',Auth::user()->id)->first();
        $orders = Professionalorder::where('professional_id',$professional->id)->orderBy('created_at','desc')->get();
        return view('professionel.app-professional',compact('orders'));
    }

    public function orderLines($id){
        $professional = Professionnel::where('user_id',Auth::user()->id)->first();
        $orderlines = Professionalorderline::where('professionalorder_id',$id)->get();
        $total = Professionalorderline::where('professionalorder_id',$id)->sum('total');
        $tva = null;
        $sub_total = null;
        if($professional->type == 'Orika'){
            $tva = ($total*19)/100;
            $sub_total = $total;
            $total = $total + $tva;
        }

        $number = $id;

        return view('professionel.order-lines',compact('orderlines','total','sub_total','tva','number'));
    }
}
