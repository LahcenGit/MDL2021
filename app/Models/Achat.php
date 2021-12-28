<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Achat extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;

    protected $cascadeDeletes = ['analyse'];
    protected $dates = ['deleted_at'];
    
    public function vendeur()
    {
        return $this->belongsTo(Vendeur::class,'vendeur_id')->withTrashed();
    }

    public function analyse()
    {
        return $this->hasOne(Analyse::class);
    }
}
