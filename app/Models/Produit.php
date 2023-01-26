<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    public function images()
{
    return $this->hasMany(Image::class);
}

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function cartlines()
    {
        return $this->hasMany(Cartline::class);
    }
    public function professionalOrderLines()
    {
        return $this->hasMany(Professionalorderline::class);
    }

    public function particularOrderLines()
    {
        return $this->hasMany(Particularorderline::class);
    }
}
