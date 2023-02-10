<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\Professionnel;
use App\Models\User;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilProfessionalController extends Controller
{
    //
    public function index(){
        $wilayas = Wilaya::all();
        return view('professionel.profil',compact('wilayas'));
    }

    public function update(Request $request , $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
          }
        $user->save();

        $professional = Professionnel::where('user_id',$id)->first();

        $professional->entreprise = $request->entreprise;
        $professional->adresse = $request->adresse;
        $professional->phone = $request->phone;
        $professional->fax = $request->fax;
        $professional->wilaya = $request->wilaya;
        $professional->RC = $request->RC;
        $professional->NIF = $request->NIF;
        $professional->type = $request->type;
        $professional->save();
        return redirect()->back();
    }
}
