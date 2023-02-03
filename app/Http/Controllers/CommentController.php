<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('professionalParticularAuth');
    }
    public function store(Request $request){
        $user = User::where('id',Auth::user()->id)->first();
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->product_id = 1;
        $comment->comment = $request->comment;
        $comment->save();

        $data = array(
            'date' => $comment->created_at->format('Y-m-d H:m'),
            'name' => $comment->user->name,
            'comment' => $comment->comment,
        );
        return $data;
    }
}
