<?php

namespace App\Http\Controllers;

use App\Mail\MailContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function index(){
      return view('contact');
    }
    public function store(Request $request){
     Mail::to('benosmanhind@gmail.com')->send(new MailContact($request));
        return 1;
    }
}
