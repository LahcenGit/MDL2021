<?php

namespace App\Http\Controllers\professional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppProfessionalController extends Controller
{
    public function index(){
        return view('professionel.app-professional');
    }
}
