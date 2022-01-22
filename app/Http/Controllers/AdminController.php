<?php

namespace App\Http\Controllers;

use App\Models\Particulier;
use Illuminate\Http\Request;
use App\Models\Order;
class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $order = Order::count();
        $pendingorder= Order::where('statut',1)->count();
        $gain = Order::selectRaw('sum(total) as total')->first();
        $orders = Order::get();
       
        return view('admin.dashboard-admin',compact('order','pendingorder','gain','orders'));
       

    }
}
