<?php

namespace App\Http\Controllers;

use App\Models\Particulier;
use Illuminate\Http\Request;
use App\Models\Order;
class AdvController extends Controller
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
        $orders = Order::limit(10)->get()->reverse();

        return view('adv.dashboard-adv',compact('order','pendingorder','gain','orders'));


    }
}
