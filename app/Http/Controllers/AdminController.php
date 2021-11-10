<?php

namespace App\Http\Controllers;

use App\Models\Particulier;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $particuliers = Particulier::with('user')->get();
        return view('admin.particuliers',compact('particuliers'));
    }

    public function destroy($id){
        $particulier = Particulier::find($id);
        $particulier->delete();
        return redirect('dashboard-admin/particuliers')->with('success','Client supprimé :)');
    }
}
