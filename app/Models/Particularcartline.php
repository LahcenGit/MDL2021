<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Particularcartline extends Model
{
    use HasFactory;
    public function particularcart()
    {
        return $this->belongsTo(Particularcart::class,'particularcart_id');
    }
    public function product()
    {
        return $this->belongsTo(Produit::class);
    }
}
