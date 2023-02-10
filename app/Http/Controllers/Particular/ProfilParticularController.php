<?php

namespace App\Http\Controllers\Particular;

use App\Http\Controllers\Controller;
use App\Models\Particulier;
use App\Models\User;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilParticularController extends Controller
{
    //
    public function index(){
        $wilayas = Wilaya::all();
        return view('particulier.profil',compact('wilayas'));
    }

    public function update(Request $request , $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
          }
        $user->save();

        $particular = Particulier::where('user_id',$id)->first();
        $particular->wilaya = $request->wilaya;

        $particular->adresse = $request->address;
        $particular->phone = $request->phone;

        $particular->save();
        return redirect()->back();
    }
}
