<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professionalorder;
use App\Models\Professionalorderline;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatistiqueController extends Controller
{
    public function index(){
        $currentMonth = Carbon::now()->month;

        $professionals =Professionalorder::join('professionalorderlines', 'professionalorders.id', '=', 'professionalorderlines.professionalorder_id')
            ->select('professionalorders.professional_id', Professionalorderline::raw('SUM(professionalorderlines.qte) as total_quantity'))
            ->whereMonth('professionalorders.created_at', $currentMonth)
            ->groupBy('professionalorders.professional_id')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();
         return view('admin.statistiques',compact('professionals'));
    }


}
