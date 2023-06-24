<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    public function calculateNote(){
        $count =  Workertache::where('worker_id',$this->id)->count();
        $sum = Workertache::where('worker_id',$this->id)->sum('note');
        if($count == 0){
            $note = 0;
        }
        else{
            $note = $sum/$count;
        }

        return $note;
    }
}
