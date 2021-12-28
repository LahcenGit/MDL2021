<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class ProfilmilkcheckController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        return view('milkcheck.profil',compact('user'));
    }

    public function update(Request $request, $id){
      
        $user = User::find($id);
        
        $user->name = $request['name'];
        $user->email = $request['email'];
        
           
        $user->save();
        return redirect('milkcheck');
    
}
}