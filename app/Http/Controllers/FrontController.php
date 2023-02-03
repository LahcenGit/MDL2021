<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Particularcartline;
use App\Models\Particularorderline;
use App\Models\Produit;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function welcome(){
     $products = Produit::where('type','particular')->orderBy('flag','asc')->get();
     return view('welcome',compact('products'));
    }
    public function detailProduct($slug){
        $product = Produit::where('slug',$slug)->first();
        $related_products = Produit::where('slug', '!=' , $slug)->where('type','particular')->limit(3)->get();
        $best_sellers = Particularorderline::selectRaw('sum(qte) as sum')
                                            ->selectRaw('product_id')
                                            ->with('product')
                                            ->groupBy('product_id')
                                            ->orderBy('sum','desc')
                                            ->limit('3')->get();
        $comments = Comment::where('product_id',$product->id)->get();
        return view('detail-product',compact('product','related_products','best_sellers','comments'));
    }
}
