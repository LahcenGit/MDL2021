<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Particularorder extends Model
{
    use HasFactory;
    public function particular()
    {
        return $this->belongsTo(Particulier::class,'particular_id');
    }
    public function particularorderlines()
    {
        return $this->hasMany(Particularorderline::class);
    }
}
