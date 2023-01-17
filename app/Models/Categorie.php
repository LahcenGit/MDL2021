<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->hasMany(Categorie::class, 'parent_id');
    }

    // This is method where we implement recursive relationship
    public function childCategories()
    {
        return $this->hasMany(Categorie::class, 'parent_id')->with('categories');
    }

    public function parent()
   {
           return $this->belongsTo(Categorie::class, 'parent_id');
   }
}
