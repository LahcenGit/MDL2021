<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ramadanpack extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'wilaya',
        'code',
        'qte',
        'price',
        'total',
        'note',
        'status',
        'delivery_coast',
    ];
}
