<?php

namespace App\Http\Controllers;

use App\Models\Citie;
use App\Models\Commune;
use App\Models\Wilaya;
use App\Models\Eleveur;
use Illuminate\Http\Request;

class EleveurController extends Controller
{
    //
    public function index(){
        $wilayas = Citie::distinct()->get('wilaya_name');
       
        return view('eleveur',compact('wilayas'));
    }

    public function store(Request $request){
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'wilaya' => ['required', 'string', 'max:255'],
            'commune' => ['required', 'string', 'max:255'],
            'check' => ['required', 'string', 'max:255'],
            
   
           ]);
        $eleveur = new Eleveur();
        $eleveur->nom = $request->nom;
        $eleveur->prenom = $request->prenom;
        $eleveur->type = $request->type;
        $eleveur->phone = $request->phone;
        $eleveur->email = $request->email;
        $eleveur->wilaya = $request->wilaya;
        $eleveur->commune = $request->commune;
        $eleveur->check = '0';
        $eleveur->save();


        $nom =  $eleveur->nom;
        $prenom =  $eleveur->prenom;
        $wilaya =  $eleveur->wilaya;
        $type =  $eleveur->type;
        return view('badge',compact('nom','prenom','wilaya','type'))
        ->with('success','تم التسجيل بنجاح ! سعداء بالالتقاء بكم جميعًا، يرجى الاحتفاظ بالشارة الظاهرة في الأسفل ');; 

    }
    


    public function statistiqueConfirm(){
 
        $eleveurs = Eleveur::where('type','!=','مشارك')->where('type','!=','بيطري')->where('phone','!=','0')->get();
        $nbrc = Eleveur::where('check','1')->count();
        $nbrr = Eleveur::where('check','2')->count();
        $nbra = Eleveur::where('check','3')->count();

        return view('statistique-confirmation',compact('eleveurs','nbrc','nbrr','nbra'));
      }


    public function confirm($id,$type){

        $eleveur = Eleveur::find($id);
        if($type == '1'){
            $eleveur->check = '1';
            $eleveur->save();
        }
   
        if($type == '2'){
            $eleveur->check = '2';
            $eleveur->save();
        }
   
        if($type == '3'){
            $eleveur->check = '3';
            $eleveur->save();
        }


        
   
 

        return redirect()->back();
      }

    public function selectCommune($name){
        $communes = Citie::where('wilaya_name',$name)->get();
        return $communes;
    }

    public function statistique(){
        $total = Eleveur::count();
        $eleveur = Eleveur:: where('type','مربي')->count();
        $agriculteur = Eleveur:: where('type','فلاح')->count();
        $collecteur = Eleveur::where('type','جامع الحليب')->count(); 
        $veterinaire = Eleveur::where('type','بيطري')->count();
        $autre = Eleveur::where('type','مشارك')->count();
        $eleveurs = Eleveur::all();

        $wilayas= Eleveur::
                           groupBy('wilaya')
                           ->selectRaw('wilaya')
                           ->selectRaw('count(*) as total')
                           ->get();
       
        return view('statistique',compact('total','eleveur','collecteur','veterinaire','autre','eleveurs','agriculteur','wilayas'));
      }
}
