<?php

namespace App\Http\Controllers\Delivry;

use App\Http\Controllers\Controller;
use App\Models\Delivryorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DelivryorderController extends Controller
{
    //
    public function index(){
        $orders = Delivryorder::where('user_id',Auth::user()->id)->get();

        return view('delivry.dashboard-delivry',compact('orders'));
    }
}
