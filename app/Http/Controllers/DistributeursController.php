<?php

namespace App\Http\Controllers;

use App\Distributeur;
use Illuminate\Http\Request;

class DistributeursController extends Controller
{
    public function index(){
        $distributeurs = Distributeur::all();

        return view("distributeurs.index",compact('distributeurs'));
    }

    public function create(){

        return view("distributeurs.create");
    }

    public function store(Request $request){

        $request->validate([
            'nomDis' => 'required',
            'prenomDis' => 'required',
            'teleDis' => 'required',
            'adrsDis' => '',
        ]);

        $distributeur = new Distributeur();

        $distributeur->nameDis = $request->nomDis.' ' .$request->prenomDis;
        $distributeur->teleDis = $request->teleDis;
        $distributeur->adrsDis = $request->adrsDis;



        $distributeur->save();

        return redirect('/admin/distributeurs')->with('status','distributeur bien ajouter');


    }


    public function edit($id){
        $distributeur = Distributeur::find($id);

        return view('distributeurs.edit',compact('distributeur'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'nomDis' => 'required',
            'prenomDis' => 'required',
            'teleDis' => 'required',
            'adrsDis' => '',
        ]);



        $distributeur = Distributeur::find($id);
        $distributeur->nameDis = $request->nomDis.' ' .$request->prenomDis;
        $distributeur->teleDis = $request->teleDis;
        $distributeur->adrsDis = $request->adrsDis;

        $distributeur->save();

        return redirect('/admin/distributeurs')->with('status','distributeur bien modifier');
    }

    public function destroy($id){
        $distributeur = Distributeur::find($id);
        $distributeur->delete();

        return redirect('/admin/distributeurs')->with('status','distributeur bien supprimer');
    }

}
