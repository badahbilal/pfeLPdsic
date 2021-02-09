<?php

namespace App\Http\Controllers;

use App\Commande;
use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $clients = User::all();

        return view('client.index',compact('clients'));
    }

    public function getCommandByClient($id){

        $commandes = Commande::where('idClient','=',$id)->get();
        return view('commandes.index',['commandes'=>$commandes]);
    }
}
