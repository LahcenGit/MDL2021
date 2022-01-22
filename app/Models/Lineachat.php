<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lineachat extends Model
{
    use HasFactory;


    public function breeder()
    {
        return $this->belongsTo(Breeder::class,'breeder_id');
    }

    public function achat()
    {
        return $this->belongsTo(Achat::class,'achat_id');
    }
}
