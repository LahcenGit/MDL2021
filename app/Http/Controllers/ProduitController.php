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
        return view('admin.produits',compact('produits'));
    }
    public function create(){
        $categories = Categorie::whereNull('parent_id')
            ->with('childCategories')
            ->orderby('designation', 'asc')
            ->get();
        return view('admin.add-produit',compact('categories'));
    }

    public function store(Request $request){
        $hasFile = $request->hasFile('photo');
      
  
        if($hasFile){
          $path =  $request->file('photo');
          $name = $path->store('produitPhoto');
          $lien = Storage::url($name);

        }
        $produit = new Produit();
        $produit->designation = $request->designation;
        $produit->prix = $request->prix;
        $produit->description = $request->description;
        $produit->categorie_id = $request->categorie;
        
        $produit->save();

        $media = new Image;
        $media->lien = $lien;
        $produit->images()->save($media);
        return redirect('dashboard-admin/produits');
    }
}
