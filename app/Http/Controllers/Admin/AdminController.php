<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Particularorder;
use App\Models\Productionline;
use App\Models\Professionalorder;
use App\Models\Visit;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard-admin');
    }

    public function advOrders(){
        $current_month = Carbon::now()->month;
        $current_year = Carbon::now()->year;
        $professional_orders = Professionalorder::orderBy('created_at', 'desc')->get();

        $particulars_orders = Particularorder::orderBy('created_at', 'desc')
                                               ->get();

        $revenu_pro = Professionalorder::where('status', 4)
            ->whereYear('created_at', $current_year)
            ->whereMonth('created_at', $current_month)
            ->sum('total');

        $revenu_particular = Particularorder::where('status', 3)
            ->whereYear('created_at', $current_year)
            ->whereMonth('created_at', $current_month)
            ->sum('total');

        $nbr_order_pro = Professionalorder::whereYear('created_at', $current_year)
            ->whereMonth('created_at', $current_month)
            ->count();

        $nbr_order_pro_en_attente = Professionalorder::where('status', 1)
            ->whereYear('created_at', $current_year)
            ->count();

        $totalCategoryOrder = Professionalorder::join('professionalorderlines', 'professionalorders.id', '=', 'professionalorderlines.professionalorder_id')
            ->join('produits', 'professionalorderlines.product_id', '=', 'produits.id')
            ->join('categories', 'produits.categorie_id', '=', 'categories.id')
            ->where('categories.id', 3)
            ->where('status', 4)
            ->whereYear('professionalorders.created_at', $current_year)
            ->whereMonth('professionalorders.created_at', $current_month)
            ->sum('professionalorderlines.total');

        return view('admin.adv',compact('professional_orders','particulars_orders','revenu_pro','revenu_particular','nbr_order_pro','nbr_order_pro_en_attente','totalCategoryOrder','current_month'));
    }
    public function commercial(){
        $orders = Professionalorder::where('commercial_id','!=',Null)->orderBy('created_at','desc')->get();
        $visits = Visit::orderBy('created_at','desc')->get();
        $nbr_visit = Visit::count();
        $count_satisfaction = Visit::where('price_feedback',0)->orWhere('price_feedback',1)->count();
        $satisfaction_price = ( $count_satisfaction *100)/ $nbr_visit;
        $count_cp = Visit::where('cp',1)->count();
        $cp = ( $count_cp *100)/ $nbr_visit;
        return view('admin.commercial',compact('orders','visits','nbr_visit','satisfaction_price','cp'));
    }
    public function production(){
        $productionlines = Productionline::orderBy('created_at','desc')->get();
        return view('admin.labo',compact('productionlines'));
    }
    public function workers(){
        $workers = Worker::all();
        return view('admin.workers',compact('workers'));
    }


    public function updateData(Request $request)
    {
        $current_month = $request->input('month');
        $current_year = date('Y');
        $revenu_pro = Professionalorder::where('status', 4)
            ->whereYear('created_at', $current_year)
            ->whereMonth('created_at', $current_month)
            ->sum('total');
        $revenu_adv = Professionalorder::where('status', 4)
            ->whereYear('created_at', $current_year)
            ->whereMonth('created_at', $current_month)
            ->where('commercial_id',NULL)
            ->sum('total');

        $revenu_commercial = Professionalorder::where('status', 4)
            ->whereYear('created_at', $current_year)
            ->whereMonth('created_at', $current_month)
            ->where('commercial_id',148)
            ->sum('total');
        $revenu_commercial_2 = Professionalorder::where('status', 4)
            ->whereYear('created_at', $current_year)
            ->whereMonth('created_at', $current_month)
            ->where('commercial_id',0)
            ->sum('total');

        $revenu_particular = Particularorder::where('status', 3)
            ->whereYear('created_at', $current_year)
            ->whereMonth('created_at', $current_month)
            ->sum('total');

        $nbr_order_pro = Professionalorder::whereYear('created_at', $current_year)
            ->whereMonth('created_at', $current_month)
            ->count();

        $nbr_order_pro_en_attente = Professionalorder::where('status', 1)
            ->whereYear('created_at', $current_year)
            ->count();

        $totalCategoryOrder = Professionalorder::join('professionalorderlines', 'professionalorders.id', '=', 'professionalorderlines.professionalorder_id')
            ->join('produits', 'professionalorderlines.product_id', '=', 'produits.id')
            ->join('categories', 'produits.categorie_id', '=', 'categories.id')
            ->where('categories.id', 3)
            ->where('status', 4)
            ->whereYear('professionalorders.created_at', $current_year)
            ->whereMonth('professionalorders.created_at', $current_month)
            ->sum('professionalorderlines.total');

        return response()->json([
            'revenu_pro' => $revenu_pro,
            'revenu_particular' => $revenu_particular,
            'revenu_adv' => $revenu_adv,
            'revenu_commercial' => $revenu_commercial,
            'revenu_commercial_2' => $revenu_commercial_2,
            'nbr_order_pro' => $nbr_order_pro,
            'nbr_order_pro_en_attente' => $nbr_order_pro_en_attente,
            'totalCategoryOrder' => $totalCategoryOrder,
        ]);
    }
}
