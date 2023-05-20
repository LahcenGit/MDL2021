<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivryorder extends Model
{
    use HasFactory;
    public function professionalOrder()
    {
        return $this->belongsTo(Professionalorder::class,'professionalorder_id');
    }
}
