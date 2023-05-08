<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Transformationlait extends Model
{
    use HasFactory;
    public function stocklaits(): MorphMany
    {
        return $this->morphMany(Stocklait::class, 'stocklaitable');
    }
}
