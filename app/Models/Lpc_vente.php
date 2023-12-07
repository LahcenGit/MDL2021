<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lpc_vente extends Model
{
    use HasFactory;

    public function client(){
        return $this->belongsTo(Lpc_client::class ,'lpc_client_id');
    }
}
