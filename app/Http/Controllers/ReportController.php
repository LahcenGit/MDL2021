<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Analyse;
use App\Models\Breeder;
use App\Models\Collector;
use App\Models\Lineachat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){

        return view('milkcheck.report');

    }


    public function getType($type){
        if($type == "collector"){
            return $collectors = Collector::all();
        }
        if($type== "breeder"){
            return $breeders = Breeder::all();
        }

    }

    public function reportDetail(Request $request){
        $qteglobal = 0 ;
        $i = 0 ;
        $price = 0 ;

        if($request->type == "breeder"){
            if($request->date=="m"){

                $date = Carbon::now()->format('M-Y');
                $breeder = Breeder::find($request->id);
                $lineachats = Lineachat::whereMonth('created_at', Carbon::now()->month)
                             ->where('breeder_id',$request->id)
                             ->get();
            }

            if($request->date=="p"){

                $date = Carbon::now()->format('M-Y');
                $breeder = Breeder::find($request->id);
                $datedebut = $request->datedebut ;
                $datefin = $request->datefin;
                $lineachats = Lineachat::whereDate('created_at','>=', $request->datedebut)
                                        ->whereDate('created_at','<=' ,$request->datefin )
                                        ->where('breeder_id',$request->id)
                                        ->get();
            }


            foreach($lineachats as $lineachat){
                $i++;
                $qteglobal = $qteglobal + $lineachat->qte;
                $price = $price + $lineachat->price;
            }

            $pricemoy = $price/$i;
            if($request->date=="p"){
                return view('milkcheck.report-custom-date-breeder',compact('lineachats','datedebut','datefin','breeder','pricemoy','qteglobal'));
            }
            if($request->date == "m"){
            return view('milkcheck.report-detail-breeder',compact('lineachats','date','breeder','pricemoy','qteglobal'));
            }
        }



        if($request->type == "collector"){




            if($request->date=="m"){

                $date = Carbon::now()->format('M-Y');
                $collector = Collector::find($request->id);

                $achats = Achat::whereMonth('created_at', Carbon::now()->month)
                             ->where('collector_id',$request->id)
                             ->get();
                $list = array();
            }


            if($request->date=="w"){

                $date = Carbon::now()->format('M-Y');
                $collector = Collector::find($request->id);

                $achats = Achat::whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SATURDAY),Carbon::now()->endOfWeek(Carbon::FRIDAY)])
                             ->where('collector_id',$request->id)
                             ->get();
                $list = array();
            }

            if($request->date=="p"){

                $date = Carbon::now()->format('M-Y');
                $collector = Collector::find($request->id);

                $datedebut = $request->datedebut ;
                $datefin = $request->datefin;

                $achats = Achat::whereDate('created_at','>=', $request->datedebut)
                             ->whereDate('created_at','<=' ,$request->datefin )
                             ->where('collector_id',$request->id)
                             ->get();
                $list = array();
            }

            foreach($achats as $achat){
                array_push($list, $achat->id);
            }
            $lineachats = Lineachat::whereIn('achat_id',$list)

                                     ->groupBy('breeder_id')
                                     ->groupBy('price')
                                     ->selectRaw('price')
                                     ->selectRaw('breeder_id')
                                     ->selectRaw('sum(qte) as qte')
                                     ->with('breeder')
                                     ->get();
            // dd($lineachats);
            foreach($lineachats as $lineachat){
                $i++;
                $qteglobal = $qteglobal + $lineachat->qte;
                $price = $price + $lineachat->price;
            }

            $pricemoy = $price/$i;

            if($request->date=="p"){
                return view('milkcheck.report-custom-date-collector',compact('lineachats','datedebut','datefin','collector','pricemoy','qteglobal'));
            }

            elseif($request->date=="m"){
                return view('milkcheck.report-detail-collector',compact('lineachats','date','collector','pricemoy','qteglobal'));
            }


         }



    }

    public function achatTicket($id){

        $achat = Achat::find($id);
        $analyse = Analyse::where('achat_id',$achat->id)->first();
        $date = Carbon::today()->format('d-m-Y');
        return view('milkcheck.achat-ticket',compact('achat','date','analyse'));

    }

    public function generateFiche(){
        $breeders = Breeder::orderBy('created_at','desc')->get();
        return view('milkcheck.generate-fiche-payment',compact('breeders'));
    }
    public function fichePayment(Request $request){

    if($request->type == 'breeder'){

        $breeder = Breeder::find($request->id);
        $stat = Lineachat::selectRaw('sum(qte) as sum_qte')->selectRaw('avg(price) as price')->where('breeder_id',$request->id)->whereMonth('created_at',$request->date)->whereYear('created_at',$request->year)->first();
        $date = Carbon::createFromFormat('m', $request->date)->locale('fr');
        $month = $date->format('F');
        $total = $stat->sum_qte * number_format($stat->price ,2);

        return view('milkcheck.fiche-payment-breeder',compact('breeder','stat','month','total'));
    }
    else{
        $collector = Collector::find($request->id);
        $stat = Achat::selectRaw('sum(qte) as sum_qte')->where('collector_id',$request->id)->whereMonth('created_at',$request->date)->whereYear('created_at',$request->year)->first();
        $date = Carbon::createFromFormat('m', $request->date)->locale('fr');
        $month = $date->translatedFormat('F');
        $total = $stat->sum_qte * 5;
        $pu = 5;
        return view('milkcheck.fiche-payment-collector',compact('collector','stat','month','total','pu'));
    }

    }

    public function generateFicheSoutien(){
        $breeders = Breeder::orderBy('created_at','desc')->get();
        return view('milkcheck.generate-fiche-soutien',compact('breeders'));
    }

    public function ficheSoutienBreeder(Request $request){
        $breeder = Breeder::find($request->breeder);
        $stat = Lineachat::selectRaw('sum(qte) as sum_qte')->where('breeder_id',$request->breeder)->whereMonth('created_at',$request->date)->whereYear('created_at',$request->year)->first();
        $date = Carbon::createFromFormat('m', $request->date)->locale('fr');
        $month = $date->translatedFormat('F');
        if($breeder->agrement_type == 'A'){
            $total = $stat->sum_qte * 14;
            $pu = 14;

        }
        if($breeder->agrement_type == 'IS'){
            $total = $stat->sum_qte * 12;
            $pu = 12;

        }

        return view('milkcheck.fiche-soutien-breeder',compact('breeder','stat','month','total','pu'));
       }

}
