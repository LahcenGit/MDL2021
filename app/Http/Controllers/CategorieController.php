<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function create(){
        $categories = Categorie::all();
        return view('admin.add-categorie',compact('categories'));
    }

    public function index(){
        $categories = Categorie::where('parent_id',NULL)->get();
        return view('admin.categories',compact('categories'));
    }

    public function store(Request $request){
 

        $request->validate([
         'designation' => ['required', 'string', 'max:255'],
         

        ]);
         $categorie = new Categorie();
         $categorie->designation=$request['designation'];

         if($request['categorie'] == 0){
          $categorie->parent_id == NULL;
         }
         else{
             $categorie->parent_id = $request['categorie'];
         }

     

         $categorie->save();

         return redirect('dashboard-admin/categories')->with('success','Categorie "' .$categorie->designation. '" a été ajoutée avec succes !');
    }
}
