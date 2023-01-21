<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professionalorder extends Model
{
    use HasFactory;
    public function professional()
    {
        return $this->belongsTo(Professionnel::class,'professional_id');
    }
    public function professionalorderlines()
    {
        return $this->hasMany(Professionalorderline::class);
    }
}
