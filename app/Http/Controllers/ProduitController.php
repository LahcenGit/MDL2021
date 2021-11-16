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
        $hasFileP = $request->hasFile('photo');
        $hasFile = $request->hasFile('imageFile');
  
        /*if($hasFileP){
          $path =  $request->file('photo');
          $name = $path->store('produitPhoto');
          $lien = Storage::url($name);

        }*/
        $lien = [];
        
        $produit = new Produit();
        $produit->designation = $request->designation;
        $produit->prix = $request->prix;
        $produit->description = $request->description;
        $produit->categorie_id = $request->categorie;
        
        $produit->save();
        if($hasFile){
            foreach($request->file('imageFile') as $file){
            $path =  $file;
            $name = $path->store('produitPhoto');
            $lien = Storage::url($name); 

            $fileModal = new Image();
            $fileModal->lien = $lien;
            
            $produit->images()->save($fileModal);
            }

        }
        return redirect('dashboard-admin/produits');
    }
}
