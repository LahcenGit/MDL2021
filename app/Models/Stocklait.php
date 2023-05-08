<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Stocklait extends Model
{
    use HasFactory;
    public function stocklaitable(): MorphTo
    {
        return $this->morphTo();
    }
}
