<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Commande;
use App\Distributeur;
use App\Produit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home() {

        $users[] = Auth::user();
        $users[] = Auth::guard()->user();
        $users[] = Auth::guard('admin')->user();

        $countUser = User::all()->count();
        $countCom = Commande::all()->count();
        $countDis = Distributeur::all()->count();
        $countProd = Produit::all()->count();
        $countCat = Categorie::all()->count();

        return view('admin2.home',[
            'countUser' =>$countUser,
            'countCom'  =>$countCom,
            'countDis'  =>$countDis,
            'countProd' =>$countProd,
            'countCat'  =>$countCat
        ]);
    }
}
