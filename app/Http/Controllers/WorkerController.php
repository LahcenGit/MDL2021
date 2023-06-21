<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    //
    public function index(){
        $workers = Worker::orderBy('created_at','desc')->get();
        return view('milkcheck.workers',compact('workers'));
    }
    public function create(){
        return view('milkcheck.add-worker');
    }
    public function store(Request $request){
        $worker = new Worker();
        $worker->name = $request->name;
        $worker->phone = $request->phone;
        $worker->address = $request->address;
        $worker->email = $request->email;
        $worker->date_birth = $request->date_birth;
        $worker->post = $request->post;
        $worker->save();
        return redirect('milkcheck/workers');
    }
}
