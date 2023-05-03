<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Particularorder extends Model
{
    use HasFactory;
    public function particular()
    {
        return $this->belongsTo(Particulier::class,'particular_id');
    }
    public function particularorderlines()
    {
        return $this->hasMany(Particularorderline::class);
    }
    public function stocks(): MorphMany
    {
        return $this->morphMany(Stock::class, 'stocktable');
    }
}
