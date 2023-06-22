<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workertache extends Model
{
    use HasFactory;
    public function tache(){
        return $this->belongsTo(Tache::class,'tache_id');
    }
}
