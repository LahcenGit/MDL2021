<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lineachat extends Model
{
    use HasFactory,SoftDeletes;


    public function breeder()
    {
        return $this->belongsTo(Breeder::class,'breeder_id');
    }

    public function achat()
    {
        return $this->belongsTo(Achat::class,'achat_id');
    }
}
