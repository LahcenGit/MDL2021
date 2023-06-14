<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professionalorder;
use App\Models\Professionalorderline;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function getData(){
        $data = Professionalorderline::where('product_id', 11)
        ->selectRaw('COALESCE(SUM(qte), 0) as sumQte, MONTH(created_at) as month')
        ->groupBy('month')
        ->orderBy('month', 'asc')
        ->pluck('sumQte', 'month')
        ->toArray();

    // Ajouter les mois manquants avec une quantité de 0
    $allMonths = range(1, 12);
    $data = array_replace(array_fill_keys($allMonths, 0), $data);

    return $data;
    }

}
