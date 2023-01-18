<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Image;

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

        $produit = new Produit();
        $produit->designation = $request->designation;
        $produit->prix = $request->prix;
        $produit->short_description = $request->short_description;
        $produit->long_description = $request->long_description;
        $produit->categorie_id = $request->categorie;
        $produit->capacity = $request->capacity;
        $produit->save();
        if($has_first_image){
            $destination = 'public/images/products';
            $path = $request->file('first_image')->store($destination);
            $storageName = basename($path);
            $image = new Image();
            $image->lien = $storageName;
            $image->type = 1;
            $produit->images()->save($image);
        }
        return redirect('admin/products');
    }
}
