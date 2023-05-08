<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Stock extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Produit::class,'product_id');
    }
    public function stocktable(): MorphTo
    {
        return $this->morphTo();
    }
}
