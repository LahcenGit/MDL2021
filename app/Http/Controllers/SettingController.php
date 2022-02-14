<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index(){
        $parameters = Setting::where('type','milkcheck')->get();
        return view('milkcheck.parameters',compact('parameters'));
    }

    public function create(){
        return view('milkcheck.add-parameter');
    }

    public function store(Request $request){
        $parameter = new Setting();
        $parameter->type = $request->type;
        $parameter->name = $request->name;
        $parameter->value1 = $request->value;
        $parameter->save();
        return redirect('milkcheck/parameters');
    }

    public function edit($id){
        $parameter = Setting::find($id);
        return view('milkcheck.edit-milkcheck-parameter',compact('parameter'));
    }

    public function update(Request $request , $id){
        $parameter = Setting::find($id);
        $parameter->type = $request->type;
        $parameter->name = $request->name;
        $parameter->value1 = $request->value;
        $parameter->save();
        return redirect('milkcheck/parameters');
    }

    public function destroy($id){
        $parameter = Setting::find($id);
        $parameter->delete();
        return redirect('milkcheck/parameters');
    }
}
