<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Production extends Model
{
    use HasFactory;
    public function stocks(): MorphMany
    {
        return $this->morphMany(Stock::class, 'stocktable');
    }

}
