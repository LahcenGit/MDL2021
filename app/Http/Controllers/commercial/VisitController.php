<?php

namespace App\Http\Controllers\commercial;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Professionnel;
use App\Models\User;
use App\Models\Visit;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    //
    public function index(){
        $visits = Visit::orderby('created_at','desc')->get();
        return view('commercial.visits',compact('visits'));
    }
    public function create(){
        $professionals = Professionnel::orderBy('created_at','desc')->get();
        $wilayas = Wilaya::all();
        return view('commercial.add-visit',compact('professionals','wilayas'));
    }

    public function store(Request $request){
        dd($request->check );

        
        if($request->check == 1){
            $user = new User();
            $user->name = $request->name;
            $user->type = 'professional';
            $user->save();
            $professional = new Professionnel();
            $professional->user_id = $user->id;
            $professional->commercial_id = Auth::user()->id;
            $professional->phone = $request->phone;
            $professional->wilaya = $request->wilaya;
            $professional->type = $request->type;
            $professional->gps = $request->position_gps;
            $professional->save();
            $cart = new Cart();
            $cart->professional_id = $professional->id;
            $cart->save();

            $visit = new Visit();
            $visit->professional_id = $professional->id;
            $visit->commercial_id = Auth::user()->id;
            $visit->note = $request->note;
            $visit->etat = $request->etat;
            $visit->cp = $request->cp;
            $visit->price_feedback = $request->price_feedback;
            $visit->save();

    }
    else{
            $visit = new Visit();
            $visit->professional_id = $request->professional;
            $visit->commercial_id = Auth::user()->id;
            $visit->note = $request->note;
            $visit->etat = $request->etat;
            $visit->cp = $request->cp;
            $visit->price_feedback = $request->price_feedback;
            $visit->save();
    }
    return redirect('/commercial/visits');
}
public function edit($id){
    $visit = Visit::find($id);
    $professionals = Professionnel::orderBy('created_at','desc')->get();
    $wilayas = Wilaya::all();
    return view('commercial.edit-visit',compact('visit','professionals','wilayas'));
}

public function update($id, Request $request){
    $visit = Visit::find($id);
    $visit->professional_id = $request->professional;
    $visit->commercial_id = Auth::user()->id;
    $visit->note = $request->note;
    $visit->etat = $request->etat;
    $visit->cp = $request->cp;
    $visit->price_feedback = $request->price_feedback;
    $visit->save();
    return redirect('/commercial/visits');

}
}
