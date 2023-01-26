<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Particularorderline extends Model
{
    use HasFactory;
    public function particularOrder()
    {
        return $this->belongsTo(Particularorder::class);
    }
    public function product()
    {
        return $this->belongsTo(Produit::class);
    }
}
