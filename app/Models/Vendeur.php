<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Vendeur extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function check(){
        $date  = $this->date_expiration;
        $result = Carbon::today()->diffInDays($date, false);
        return $result;
  
    }
}
