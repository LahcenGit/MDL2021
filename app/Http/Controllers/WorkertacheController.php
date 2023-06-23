<?php

namespace App\Http\Controllers;

use App\Models\Historiquenote;
use App\Models\Tache;
use App\Models\Worker;
use App\Models\Workertache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    return redirect('milkcheck/workers');
    }

    public function showModal($id){
        $taches = Workertache::where('worker_id',$id)->get();
        $worker = Worker::find($id);
        return view('milkcheck.modal-add-note',compact('taches','worker'));
    }

    public function storeNote(Request $request){
        $tachesNotes = json_decode($request->input('tachesNotes'));
        foreach($tachesNotes as $tacheNote){
          $tache = Workertache::find($tacheNote->tacheId);
          $tache->note = $tacheNote->noteValue;
          $tache->save();
        }
        $count =  Workertache::where('worker_id',$request->worker)->count();
        $sum = Workertache::where('worker_id',$request->worker)->sum('note');
        $note = $sum/$count;
        return $note;
    }

    public function updateNote(){
        $workers = Worker::all();
        foreach($workers as $worker){
            $result = DB::table('workertaches')
                        ->select(DB::raw('COUNT(*) as total_lignes'), DB::raw('SUM(note) as somme_note'))
                        ->where('worker_id',$worker->id)
                        ->first();
            $note = $result->somme_note/$result->total_lignes;
            $historique = new Historiquenote();
            $historique->worker_id = $worker->id;
            $historique->note = $note;
            $historique->save();
        }
        $taches = Workertache::all();
        foreach($taches as $tache){
            $tache->note = 0;
            $tache->save();
        }

        return redirect('milkcheck/workers');
    }
}
