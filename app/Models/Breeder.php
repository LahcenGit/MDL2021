<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breeder extends Model
{
    use HasFactory;


    public function collector(){
        return $this->belongsTo(colector::class);
    }

    public function check(){
        $date  = $this->expiration_date;
        $result = Carbon::today()->diffInDays($date, false);
        return $result;
    }


    public function getQteMonth(){

        $qte = Lineachat::whereMonth('created_at', Carbon::now()->month)
        ->where('breeder_id',$this->id)
        ->sum('qte');
        
        return $qte;
    }
    public function getPriceMonth(){

        $price = Lineachat::whereMonth('created_at', Carbon::now()->month)
        ->where('breeder_id',$this->id)
        ->avg('price');
        
        return $price;
    }
}
