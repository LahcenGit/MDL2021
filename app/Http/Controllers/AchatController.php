<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Analyse;
use App\Models\Collector;
use App\Models\Lineachat;
use App\Models\Stocklait;
use App\Models\Vendeur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $this->authorize("achat.viewAny");
        $achats = Achat::get()->reverse();

        return view('milkcheck.achats',compact('achats'));
    }
    public function create(){
         $this->authorize("achat.create");
        $collectors = Collector::all();

        return view('milkcheck.add-achat-stepone',compact('collectors'));
    }


    public function createAchat($id){
        $this->authorize("achat.create");
        $collector = Collector::find($id);
        $breeders = $collector->breeders;
        $date = Carbon::now()->format('Y-m-d');

        return view('milkcheck.add-achat',compact('collector','breeders','date'));
    }
    public function store(Request $request){

        $request->validate([
            'destination' => 'required',
            'price_achat' =>'required',
            'qteF' => 'required',
            'qteD' => 'required',
            'qteC' => 'required',
            'qteS' => 'required',
            'qteP' => 'required',
            'qteW' => 'required',
            'qteL' => 'required',
            'qteT' => 'required',
            'qteFP' => 'required',
            'qteA' => 'required',
        ],
        [
            'price_achat.required' =>"Veuillez calculer le prix d'achat d'abord",
        ]
    );

        $totalachat = 0;
        $collector = Collector::find($request->collector);
        $breeders = $collector->breeders;

        foreach($breeders as $breeder){
            $totalachat =  $totalachat + $request[$breeder->id.'qte'];
        }

        $achat = new Achat();

        $achat->collector_id = $request->collector;
        $achat->qte =$totalachat;
        $achat->price =  $request->price_achat;
        $achat->total = $totalachat * $request->price_achat ;
        $achat->destination = $request->destination;

        if($request->date){
            $achat->created_at = $request->date;
        }
        $achat->save();
        if($request->destination == 'lait'){
            $stock = new Stocklait();
            $stock->qte = $totalachat;
            $stock->type = "Entree";
            $achat->stocklaits()->save($stock);
        }
        foreach($breeders as $breeder){

                $line_achat = new Lineachat();
                $line_achat->achat_id = $achat->id;
                $line_achat->breeder_id = $breeder->id;
                $line_achat->qte = $request[$breeder->id.'qte'];
                $line_achat->price = $request->price_achat;
                $line_achat->total =  $request[$breeder->id.'qte'] * $request->price_achat ;
                $line_achat->save();


        }

        $analyse = new Analyse();
        $analyse->achat_id = $achat->id;
        $analyse->f = $request->qteF;
        $analyse->d = $request->qteD;
        $analyse->c = $request->qteC;
        $analyse->s = $request->qteS;
        $analyse->p = $request->qteP;
        $analyse->w = $request->qteW;
        $analyse->l = $request->qteL;
        $analyse->t = $request->qteT;
        $analyse->fp =$request->qteFP;
        $analyse->a = $request->qteA;
        $analyse->save();
        return redirect('milkcheck/achats');
    }
    public function edit($id){
        $achat = Achat::find($id);

        $this->authorize("achat.update",$achat);
        $lineachats = $achat->lineachats;
        $analyse = Analyse::where('achat_id',$id)->first();
        return view ('milkcheck.edit-achat',compact('achat','analyse','lineachats'));
    }




    public function update(Request $request, $id){

        $request->validate([
            'destination' => 'required',
            'qteF' => 'required',
            'qteD' => 'required',
            'qteC' => 'required',
            'qteS' => 'required',
            'qteP' => 'required',
            'qteW' => 'required',
            'qteL' => 'required',
            'qteT' => 'required',
            'qteFP' => 'required',
        ]);

        $totalachat = 0;
        $collector = Collector::find($request->collector);
        $breeders = $collector->breeders;

        foreach($breeders as $breeder){
            $totalachat =  $totalachat + $request[$breeder->id.'qte'];
        }

        $achat = Achat::find($id);
        $achat->qte =$totalachat;
        $achat->price =  $request->price_achat;
        $achat->total =  $totalachat * $request->price_achat;
        $achat->created_at = $request->date;
        $achat->save();
        foreach($achat->stocklaits as $stock){
            $stock->delete();
        }
        if($request->destination == 'lait'){
            $stock = new Stocklait();
            $stock->qte = $totalachat;
            $stock->type = "Entree";
            $achat->stocklaits()->save($stock);
        }

        foreach($breeders as $breeder){

            $lineachat = Lineachat::where('achat_id',$achat->id)->where('breeder_id',$breeder->id)->first();
            $lineachat->achat_id = $achat->id;
            $lineachat->breeder_id = $breeder->id;
            $lineachat->qte = $request[$breeder->id.'qte'];
            $lineachat->price = $request->price_achat;
            $lineachat->total =  $request[$breeder->id.'qte'] * $request->price_achat ;
            $lineachat->save();

        }


        $analyse = Analyse::where('achat_id',$id)->first();
        $analyse->achat_id = $achat->id;
        $analyse->f = $request->qteF;
        $analyse->d = $request->qteD;
        $analyse->c = $request->qteC;
        $analyse->s = $request->qteS;
        $analyse->p = $request->qteP;
        $analyse->w = $request->qteW;
        $analyse->l = $request->qteL;
        $analyse->t = $request->qteT;
        $analyse->fp =$request->qteFP;
        $analyse->a = $request->qteA;
        $analyse->save();
        return redirect('milkcheck/achats');
    }

    public function destroy($id){
        $achat = Achat::find($id);
        $this->authorize("achat.delete",$achat);
        $achat->delete();
        return redirect('milkcheck/achats');
    }

    public function showAchat($id){
        $achat = Achat::find($id);
        $analyse = $achat->analyse;

        return view('milkcheck.modal-achat',compact('analyse','achat'));
    }

    public function getDate($id){
    $collector = Collector::find($id);
    $date = $collector->expiration_date;
    return $date;
    }
}
