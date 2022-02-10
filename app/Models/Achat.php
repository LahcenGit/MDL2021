<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Achat extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;

    protected $cascadeDeletes = ['analyse','lineachats'];
    protected $dates = ['deleted_at'];
    
    public function collector()
    {
        return $this->belongsTo(Collector::class,'collector_id');
    }

    public function analyse()
    {
        return $this->hasOne(Analyse::class,'achat_id');
    }


    public function lineachats()
    {
        return $this->hasMany(Lineachat::class,'achat_id');
    }
}
