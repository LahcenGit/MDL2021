<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Professionnel;
use App\Models\User;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfessionalController extends Controller
{
    //
    public function create(){
     $wilayas = Wilaya::all();
     return view('adv.add-professional',compact('wilayas'));
    }

    public function index(){
        $professionals = User::where('type','professional')->orderBy('created_at','desc')->get();
        return view('adv.professionals',compact('professionals'));
    }

    public function store(Request $request){
        $user = new User;
        $user->type = 'professional';
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();

        $professional = new Professionnel();
        $professional->entreprise = $request['entreprise'];
        $professional->adresse = $request['adresse'];
        $professional->phone = $request['phone'];
        $professional->fax = $request['fax'];
        $professional->wilaya = $request['wilaya'];
        $professional->RC = $request['RC'];
        $professional->NIF = $request['NIF'];
        $professional->type = $request['type'];
        $professional->gps = $request['gps'];
        $user->professional()->save($professional);
        $cart = new Cart();
        $cart->professional_id = $professional->id;
        $cart->save();

        return redirect('adv/professionals');
    }

    public function edit($id){
        $professional = Professionnel::find($id);
        $wilayas = Wilaya::all();
        return view('adv.edit-professional',compact('professional','wilayas'));
    }

    public function update(Request $request , $id){
        $professional = Professionnel::find($id);
        $user = User::find($professional->user_id);
        $user->type = 'professional';
        $user->name = $request['name'];
        $user->email = $request['email'];
        if($request->password){
        $user->password = Hash::make($request['password']);
        }
        $user->save();

        $professional->entreprise = $request['entreprise'];
        $professional->adresse = $request['adresse'];
        $professional->phone = $request['phone'];
        $professional->fax = $request['fax'];
        $professional->wilaya = $request['wilaya'];
        $professional->RC = $request['RC'];
        $professional->NIF = $request['NIF'];
        $professional->type = $request['type'];
        $user->professional()->save($professional);
        return redirect('adv/professionals');

    }
    public function destroy($id){
        $professional = Professionnel::find($id);

        $user = User::find($professional->user_id);
        $user->delete();
        $professional->delete();
        return redirect('adv/professionals');
    }
}
