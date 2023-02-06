<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Produit;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

    public function detailBlog($slug){
        $products = Produit::where('type','particular')->orderBy('flag','asc')->get();
        $blog = Blog::where('slug',$slug)->first();
        return view('detail-blog',compact('products','blog'));
    }
}
