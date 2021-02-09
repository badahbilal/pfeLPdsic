<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Distributeur;
use Illuminate\Http\Request;

class CommandesController extends Controller
{


    public function getAllCommandes(){
        $commandes = Commande::all();
        return view('commandes.index',['commandes'=>$commandes]);
    }

    public function getAllCommandesNoLivrer(){
        $commandes = Commande::where("etatCom","=","0")->get();
        return view('commandes.index',['commandes'=>$commandes]);
    }

    public function getAllCommandesSend(){
        $commandes = Commande::where("etatCom","=","1")->get();
        return view('commandes.index',['commandes'=>$commandes]);
    }

    public function getAllCommandesLivrer(){
        $commandes = Commande::where("etatCom","=","2")->get();
        return view('commandes.index',['commandes'=>$commandes]);
    }

    public function affecterDis($id){
        $distributeurs = Distributeur::all();

        return view('commandes.livrerCommande',['distributeurs'=>$distributeurs,'id'=>$id]);
    }

    public function ajouterDisToCom(Request $request){

        $commande = Commande::find($request->idCom);
        $commande->idDis = $request->idDis;
        $commande->etatCom = 1;
        $commande->save();

        return redirect()->route('admin.commandes.all');

    }



}
