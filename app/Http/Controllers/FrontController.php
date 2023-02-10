<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Particularcartline;
use App\Models\Particularorderline;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    //
    public function welcome(){
     $products = Produit::where('type','particular')->orderBy('flag','asc')->get();
     $blogs = Blog::all();
     return view('welcome',compact('products','blogs'));
    }
    public function detailProduct($slug){
        $product = Produit::where('slug',$slug)->first();
        $rating = Comment::where('product_id',$product->id)->avg('rating');
        $related_products = Produit::where('slug', '!=' , $slug)->where('type','particular')->limit(3)->get();
        $best_sellers = Particularorderline::selectRaw('sum(qte) as sum')
                                            ->selectRaw('product_id')
                                            ->with('product')
                                            ->groupBy('product_id')
                                            ->orderBy('sum','desc')
                                            ->limit('3')->get();
        $nbr_comment = 0;
        $comments = Comment::where('product_id',$product->id)->get();
        if(Auth::user()){
            $nbr_comment = Comment::where('product_id',$product->id)->where('user_id',Auth::user()->id)->count();
        }

        return view('detail-product',compact('product','related_products','best_sellers','comments','rating','nbr_comment'));
    }

    public function products(){
        $products = Produit::where('type','particular')->orderBy('flag','asc')->get();
        return view('products',compact('products'));
    }
}
