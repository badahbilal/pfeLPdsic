<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProduitsController extends Controller
{


    public function index(){

    $produits = Produit::all();
    $categories = Categorie::all();

        return view('produits.index',['produits'=> $produits , 'categories' =>$categories]);
    }

    public function create(){

        $categories = Categorie::all();


        return view('produits.create',compact('categories'));
    }

    public function store(Request $request){

        $request->validate([
            'nomProd' => 'required',
            'descriptionProd' => 'required',
            'prixAchatProd' => 'required|min:1',
            'prixVenteProd' => 'required|min:1',
            'qteStockProd' => 'required|min:1',
            'photoProd' => 'image|nullable|dimensions:min_width=100,min_height=200,max_width=2000,max_height=2000'
        ]);
        if($request->hasFile('photoProd')){
            $file = $request->file('photoProd');
            $ext = $file->getClientOriginalExtension();
            $fileName = 'produitPhoto_'.time().".".$ext;
            $file->storeAs('public/produitsPhotos',$fileName);
        }else{
            $fileName = "noimage.png";
        }

        $produit = new Produit();

        $produit->nomProd = $request->nomProd;
        $produit->idCat = $request->idCat;
        $produit->descriptionProd = $request->descriptionProd;
        $produit->prixAchatProd = $request->prixAchatProd;
        $produit->prixVenteProd = $request->prixVenteProd;
        $produit->qteStockProd = $request->qteStockProd;
        $produit->photoProd = $fileName;


        $produit->save();

        return redirect()->back();
    }

    public function edit($id){

        $produit = Produit::find($id);
        $categories = Categorie::all();

        return view('produits.edit',[
            'produit' => $produit,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'nomProd' => 'required',
            'descriptionProd' => 'required',
            'prixAchatProd' => 'required|min:1',
            'prixVenteProd' => 'required|min:1',
            'qteStockProd' => 'required|min:1',
            'photoProd' => 'image|dimensions:min_width=100,min_height=200,max_width=2000,max_height=2000'
        ]);
        $change=false;
        if($request->hasFile('photoProd')){
            $file = $request->file('photoProd');
            $ext = $file->getClientOriginalExtension();
            $fileName = 'produitPhoto_'.time().".".$ext;
            $file->storeAs('public/produitsPhotos',$fileName);
            $change = true;
        }

        $produit = Produit::find($id);

        $produit->nomProd = $request->nomProd;
        $produit->idCat = $request->idCat;
        $produit->descriptionProd = $request->descriptionProd;
        $produit->prixAchatProd = $request->prixAchatProd;
        $produit->prixVenteProd = $request->prixVenteProd;
        $produit->qteStockProd = $request->qteStockProd;
        if($change){
            $image_path = public_path()."\storage\produitsPhotos\\".$produit->photoProd;
            unlink($image_path);
            $produit->photoProd = $fileName;
        }


        $produit->save();




        return redirect("/admin/produits")->with('status','produit bien modifier');
    }

    public function destroy($id){

        $produit = Produit::find($id);
        $produit->delete();

        return redirect("/admin/produits")->with('status','produit bien supprimer');
    }

}
