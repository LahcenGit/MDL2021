<?php

namespace App\Http\Controllers;

use App\Models\Ramadanpack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class RamadanPackController extends Controller
{
    //

    public function store(Request $request){
        $date = Carbon::now()->format('y');
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'phone' => ['required'],
            'wilaya' => ['required'],
            'address' => ['required'],
            'qte' => ['required'],
        ]);

        $attributes = [
            'name' => $request->name,
            'phone' => $request->phone,
            'wilaya' => $request->wilaya,
            'address' => $request->address,
            'qte' => $request->qte,
            'price' => 2000,
            'status' => 1,
            'code' =>  'pack'.'-'.$date,
        ];

        if ($request->wilaya == 'Alger') {
            $attributes['total'] = ($request->qte * 2000) + 500;
            $attributes['delivery_coast'] = 500;
        }
        if ($request->wilaya == 'Blida') {
            $attributes['total'] = ($request->qte * 2000) + 600;
            $attributes['delivery_coast'] = 600;
        }
        if ($request->wilaya == 'Tipaza') {
            $attributes['total'] = ($request->qte * 2000) + 800;
            $attributes['delivery_coast'] = 800;
        }
        if ($request->wilaya == 'Oran') {
            $attributes['total'] = ($request->qte * 2000) + 300;
            $attributes['delivery_coast'] = 300;
        }
        if ($request->wilaya == 'Sba') {
            $attributes['total'] = ($request->qte * 2000) + 200;
            $attributes['delivery_coast'] = 200;
        }

        Ramadanpack::create($attributes);
    }


}
