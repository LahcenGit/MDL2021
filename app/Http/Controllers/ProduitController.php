<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Image;
use Illuminate\Support\Str;
class ProduitController extends Controller
{
    //

    public function index(){
        $produits = Produit::with('categorie')->get();
        return view('admin.products',compact('produits'));
    }
    public function create(){
        $categories = Categorie::whereNull('parent_id')
            ->with('childCategories')
            ->orderby('designation', 'asc')
            ->get();
        return view('admin.add-product',compact('categories'));
    }

    public function store(Request $request){
        $has_first_image = $request->hasFile('first_image');
        $hasFile = $request->hasFile('imageFile');

        $product = new Produit();
        $product->designation = $request->designation;
        $product->bar_code = $request->bar_code;
        $product->type_emb = $request->type_emb;
        $product->pu_ht = $request->pu_ht;
        $product->dlc = $request->dlc;
        $product->price = $request->prix;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->categorie_id = $request->categorie;
        $product->capacity = $request->capacity;
        $product->slug = str::slug($request->designation);
        $product->save();
        if($has_first_image){
            $destination = 'public/images/products';
            $path = $request->file('first_image')->store($destination);
            $storageName = basename($path);
            $image = new Image();
            $image->lien = $storageName;
            $image->type = 1;
            $product->images()->save($image);
        }
        $hasFile = $request->hasFile('photos');

        if($hasFile){
            foreach($request->file('photos') as $file){
                $destination = 'public/images/products';
                $path = $file->store($destination);
                $storageName = basename($path);
                $image = new Image();
                $image->link= $storageName;
                $image->type = 2;
                $product->images()->save($image);
            }
            }
        return redirect('dashboard-admin/products');
    }
}
