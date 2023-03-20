<?php

namespace App\Http\Controllers;

use App\Models\Particulier;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Particularorder;
use App\Models\Professionalorder;
use App\Models\Stock;

class AdvController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $orders_professional = Professionalorder::limit(10)->orderBy('created_at','desc')->get();
        $orders_particular = Particularorder::limit(10)->orderBy('created_at','desc')->get();

        $resultats = Stock::selectRaw('product_id, SUM(CASE WHEN type = "Entre" THEN qte ELSE 0 END) as entree , SUM(CASE WHEN type = "sortie" THEN qte ELSE 0 END) as sortie ,  SUM(CASE WHEN type = "Entre" THEN qte ELSE 0 END) - SUM(CASE WHEN type = "sortie" THEN qte ELSE 0 END) as stock')
                        ->groupBy('product_id')
                        ->where('type', 'Entre')
                        ->orWhere('type', 'sortie')
                        ->get();
        return view('adv.dashboard-adv',compact('orders_professional','orders_particular','resultats'));
    }
}
