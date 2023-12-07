<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lpc_stock extends Model
{
    use HasFactory;
    protected $fillable = ['PDL0', 'PDL26', 'film', 'type', 'initial'];
}
