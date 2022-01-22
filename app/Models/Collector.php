<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collector extends Model
{
    use HasFactory;

    public function breeders(){
        return $this->hasMany(Breeder::class);
    }

    public function check(){
        $date  = $this->expiration_date;
        $result = Carbon::today()->diffInDays($date, false);
        return $result;
    }
}
