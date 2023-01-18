<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professionalorderline extends Model
{
    use HasFactory;
    public function professionalOrder()
    {
        return $this->belongsTo(Professionalorder::class);
    }
    public function product()
    {
        return $this->belongsTo(Produit::class);
    }
}
