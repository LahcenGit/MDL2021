<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Achat extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function vendeur()
    {
        return $this->belongsTo(Vendeur::class,'vendeur_id');
    }

    public function analyse()
    {
        return $this->hasOne(Analyse::class);
    }
}
