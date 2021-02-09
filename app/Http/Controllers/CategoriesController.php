<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //

    public function index(){
        $categories = Categorie::orderby('idCat','asc')->get();



        return view('categories.index',compact('categories'));
    }

    public function create(){
        return view("categories.create");
    }

    public function store(Request $request)
    {

        $request->validate([
            'nomCat' => 'required|min:3|max:50|unique:categories'
        ]);

        $categorie = new Categorie();
        $categorie->nomCat = $request->nomCat;
        $categorie->save();


        return redirect('/admin/categories')->with('status','catégorie bien ajouter');

    }

    public function edit($id){


        //$categorie = Categorie::where('idCat',$id)->first();
        $categorie = Categorie::find($id);

        return view("categories.edit",compact('categorie'));
    }


    public function update(Request $request,$id){
        $request->validate([
            'nomCat' => 'required|min:3|max:50|unique:categories'
        ]);

        //$categorie = Categorie::where('idCat',$id)->update(['nomCat'=>$request->nomCat]);

        $categorie = Categorie::find($id);
        $categorie->nomCat = $request->nomCat;
        $categorie->save();


        return redirect("/admin/categories")->with('status','catégorie bien modifier');
    }


    public function destroy($id){
        $categorie = Categorie::find($id);
        $categorie->delete();

        return redirect("/admin/categories")->with('status','catégorie bien supprimer');
    }
}
