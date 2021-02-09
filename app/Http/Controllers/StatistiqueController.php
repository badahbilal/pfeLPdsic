<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{


    public function index(){
        return view('statistique.index');
    }
    public function qteStock(){

        $produits = Produit::all();
        $dataPoints = [];
        foreach ($produits as $produit){
            array_push($dataPoints,[
                'y' => $produit->qteStockProd,
                "label" => $produit->nomProd
            ]);
        };

        return view('statistique.qteStock',compact('dataPoints'));
    }

    public function nbComDate(){

        $nbComs = DB::table('commandes')->select('dateCom', DB::raw('count(*) as total'))->groupBy('dateCom')->get();

        $dataPoints = [];
        foreach ($nbComs as $nbCom){
            array_push($dataPoints,[
                'y' => $nbCom->total,
                "label" => $nbCom->dateCom
            ]);
        };

        return view('statistique.nbComDate',compact('dataPoints'));
    }

    public function argentTotelComDate(){
        $totalComs = DB::table('commandes')->select('dateCom', DB::raw('sum(mantTotalCom) as total'))->groupBy('dateCom')->get();

        $dataPoints = [];
        foreach ($totalComs as $totalCom){
            array_push($dataPoints,[
                'y' => $totalCom->total,
                "label" => $totalCom->dateCom
            ]);
        };

        return view('statistique.argentTotalDate',compact('dataPoints'));
    }

    public function nbComDatePeriode(Request $request){

        $nbComs = DB::table('commandes')
                    ->select('dateCom', DB::raw('count(*) as total'))
                    ->groupBy('dateCom')
                    ->whereDate('dateCom','>=',$request->dateDebut)
                    ->whereDate('dateCom','<=',$request->dateFin)
                    ->get();



        $dataPoints = [];
        foreach ($nbComs as $nbCom){
            array_push($dataPoints,[
                'y' => $nbCom->total,
                "label" => $nbCom->dateCom
            ]);
        };

        return view('statistique.nbComDate',compact('dataPoints'));
    }

    public function argentTotalDatePeriode(Request $request){

        $totalComs = DB::table('commandes')
                        ->select('dateCom', DB::raw('sum(mantTotalCom) as total'))
                        ->groupBy('dateCom')
                        ->whereDate('dateCom','>=',$request->dateDebut)
                        ->whereDate('dateCom','<=',$request->dateFin)
                        ->get();

        $dataPoints = [];
        foreach ($totalComs as $totalCom){
            array_push($dataPoints,[
                'y' => $totalCom->total,
                "label" => $totalCom->dateCom
            ]);
        };

        return view('statistique.argentTotalDate',compact('dataPoints'));

    }
}
