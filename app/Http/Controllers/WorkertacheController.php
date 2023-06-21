<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Worker;
use App\Models\Workertache;
use Illuminate\Http\Request;

class WorkertacheController extends Controller
{
    //
    public function create(){
        $workers = Worker::orderBy('created_at','desc')->get();
        $taches = Tache::orderBy('created_at','desc')->get();
        return view('milkcheck.add-tache-to-worker',compact('workers','taches'));
    }
    public function store(Request $request){
       for($i=0; $i<count($request->taches);$i++){
        $worker_tache = new Workertache();
        $worker_tache->worker_id = $request->worker;
        $worker_tache->tache_id = $request->taches[$i];
        $worker_tache->save();
        }
    return redirect('milkcheck/worker-taches');
    }
}
