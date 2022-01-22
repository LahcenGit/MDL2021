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
}
