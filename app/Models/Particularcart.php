<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Particularcart extends Model
{
    use HasFactory;
    public function particular()
    {
        return $this->belongsTo(Particulier::class);
    }
    public function cartlines()
    {
        return $this->hasMany(Particularcartline::class);
    }
}
