<?php

namespace App\Http\Controllers;

use App\Models\Ramadanpack;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class RamadanPackController extends Controller
{
    //

    public function index(){
        return view('pack-ramadan');
    }

    public function store(Request $request){
        $date = Carbon::now()->format('y');
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'phone' => ['required'],
            'wilaya' => ['required'],
            'address' => ['required'],
        ]);

        $attributes = [
            'name' => $request->name,
            'phone' => $request->phone,
            'wilaya' => $request->wilaya,
            'address' => $request->address,
            'qte' => 1,
            'price' => 2000,
            'status' => 1,
            'code' =>  'pack'.'-'.$date,
            'note' => $request->remarque,
        ];

        if ($request->wilaya == 'Alger') {
            $attributes['total'] =  2000 + 500;
            $attributes['delivery_coast'] = 500;
        }
        if ($request->wilaya == 'Blida') {
            $attributes['total'] = 2000 + 600;
            $attributes['delivery_coast'] = 600;
        }
        if ($request->wilaya == 'Tipaza') {
            $attributes['total'] = 2000 + 800;
            $attributes['delivery_coast'] = 800;
        }
        if ($request->wilaya == 'Oran') {
            $attributes['total'] = 2000 + 300;
            $attributes['delivery_coast'] = 300;
        }
        if ($request->wilaya == 'Sba') {
            $attributes['total'] = 2000 + 200;
            $attributes['delivery_coast'] = 200;
        }
        if ($request->wilaya == 'Tlemcen') {
            $attributes['total'] = 2000;
            $attributes['delivery_coast'] = 0;
        }

        Ramadanpack::create($attributes);
        return redirect('/success-order-pack');
    }



    public function wilayaCost($name,$total){
        if($name == "Tlemcen"){
            $total = number_format($total+0,2);
            $coast = 0;
            return response()->json([
                'total' => $total,
                'coast' => $coast
            ]);
        }
        if($name == "Alger"){
            $total = number_format($total+500,2);
            $coast = 500;
            return response()->json([
                'total' => $total,
                'coast' => $coast
            ]);
        }
        if($name == "Blida"){
            $total = number_format($total+600,2);
            $coast = 600;
            return response()->json([
                'total' => $total,
                'coast' => $coast
            ]);
        }
        if($name == "Tipaza"){
            $total = number_format($total+800,2);
            $coast = 800;
            return response()->json([
                'total' => $total,
                'coast' => $coast
            ]);
        }
        if($name == "Oran"){
            $total = number_format($total+300,2);
            $coast = 300;
            return response()->json([
                'total' => $total,
                'coast' => $coast
            ]);
        }
        if($name == "Sba"){
            $total = number_format($total+200,2);
            $coast = 200;
            return response()->json([
                'total' => $total,
                'coast' => $coast
            ]);
        }
    }


}
