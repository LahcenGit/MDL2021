<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Analyse extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function achat()
    {
        return $this->belongsTo(Achat::class);
    }
}
