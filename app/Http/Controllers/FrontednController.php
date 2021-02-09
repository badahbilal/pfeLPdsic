<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Commande;
use App\LigneCommande;
use App\Produit;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontednController extends Controller
{
    public function index(){

        $produits = Produit::orderby('idProd','desc')->take(5)->get();
        return view('frontend.index',compact("produits"));
    }

    public function showProduit($id){

        $produit = Produit::find($id);

        return view('frontend.pages.showProduit',compact("produit"));
    }

    public function shop(){
        $produits = Produit::orderby('idProd','desc')->paginate(6);
        $categories = Categorie::all();
        $catName = 'Tous les produits';
        return view('frontend.pages.shop',['categories' => $categories , 'produits'=> $produits,'catName'=>$catName ]);
    }

    public function showParCategorie($id){
        $produits = Produit::where('idCat', '=' ,$id )->orderby('idProd','desc')->paginate(6);
        $categories = Categorie::all();

        $cate = Categorie::find($id);

        $catName = $cate->nomCat;

        return view('frontend.pages.shop',['categories' => $categories , 'produits'=> $produits ,'catName'=>$catName]);
    }

    public function showPersonaliser(Request $request){
        $produits = Produit::where('idCat','=',$request->idCat)
            ->where('prixVenteProd','>=',$request->minPrix)
            ->where('prixVenteProd','<=',$request->maxPrix)
            ->paginate(6);
        $categories = Categorie::all();
        $catName = 'Recherche personalise';
        return view('frontend.pages.shop',['categories' => $categories , 'produits'=> $produits ,'catName'=>$catName]);

    }

    public function addToCartSession(Request $request){
        $produit = Produit::find($request->idProd);

        if($produit->qteStockProd  < $request->qte){
            return redirect()->back()->with('status' , 'Quantite demandé est plus que la quntité disponible : '.$produit->qteStockProd);
        }

        if($request->session()->has('cart')) {
            $selection =  $request->session()->get('cart', []);
            $selection2 =  $request->session()->get('cart', []);
            $i=0;
            foreach ($selection as $item){

                if($item["id"] == $request->idProd){
                    unset($selection2[$i]);
                    $selection2 = array_values($selection2);
                    $request->session()->forget('cart');
                    $request->session()->put('cart',$selection2);
                    break;
                }
                $i++;
            }

            $request->session()->push('cart', [
                'id'    => $request->idProd,
                'qte'   => $request->qte
            ]);
            $request->session()->put('count',count( $request->session()->get("cart")));
        } else {
            $tabInfo = [];
            $tabInfo['id'] =$request->idProd;
            $tabInfo['qte'] =$request->qte;
            $tabInfo2 = [];
            $tabInfo2[0] = $tabInfo;
            $request->session()->put('cart', $tabInfo2);

            $request->session()->put('count',count( $request->session()->get("cart")));
        }
        return redirect()->route('shop');
    }




    // method use session to show value selected by client and show in view cart
    public function showCart(Request $request){
        if($request->session()->has("count")){
            $count =  $request->session()->get("count");
            if($count<1){
                return redirect()->route('shop');
            }

        }
        $tabId =[];
        if($request->session()->has('cart') ){
            $cartItems = $request->session()->get('cart');
            foreach ($cartItems as $item){
                array_push($tabId,$item['id']);
            }
            $produits = Produit::whereIn('idProd' , $tabId)->get();

            $montantTotale = 0;
            foreach ($produits as $prod){
                foreach ($cartItems as $item){
                    if($prod->idProd == $item['id'] ){
                        $montantTotale = $montantTotale +($prod->prixVenteProd * $item['qte']);
                    }
                }
            }

            return view('frontend.pages.showCart',['cartItems' =>$cartItems ,'produits' =>$produits,'montantTotale' =>$montantTotale]);
        }
        return redirect()->back();
    }

    //remove selected product from cart

    public function deleteProduitCart(Request $request , $id){

        if($request->session()->has('cart')) {
            $selection = $request->session()->get('cart', []);
            $selection2 = $request->session()->get('cart', []);
            $i = 0;
            foreach ($selection as $item) {

                if ($item["id"] == $id) {
                    unset($selection2[$i]);
                    $selection2 = array_values($selection2);
                    $request->session()->forget('cart');
                    $request->session()->put('cart', $selection2);
                    break;
                }
                $i++;
            }
            $request->session()->put('count',count( $request->session()->get("cart")));
            return redirect()->back();
        }else{
            return redirect()->route('/shop');
        }
    }


    public function checkout(Request $request){


        if($request->session()->has("count")){
            $count =  $request->session()->get("count");
            if($count<1){
                return redirect()->route('shop');
            }

        }
        $tabId =[];
        if($request->session()->has('cart') ){
            $cartItems = $request->session()->get('cart');
            foreach ($cartItems as $item){
                array_push($tabId,$item['id']);
            }
            $produits = Produit::whereIn('idProd' , $tabId)->get();

            $montantTotale = 0;
            foreach ($produits as $prod){
                foreach ($cartItems as $item){
                    if($prod->idProd == $item['id'] ){
                        $montantTotale = $montantTotale +($prod->prixVenteProd * $item['qte']);
                    }
                }
            }

            return view('frontend.pages.checkout',['cartItems' =>$cartItems ,'produits' =>$produits,'montantTotale' =>$montantTotale]);
        }
        return redirect()->back();

    }

    public function passerCommande(Request $request){



        if(!Auth::check()){
            return redirect()->route('site.home');
        }else{

            // instencie new commande
            $commande = new Commande();
            $commande->idClient = Auth::id();
            $commande->dateCom =  date("Y-m-d");
            $commande->idDis = 0;
            $commande->etatCom =0;
            $commande->mantTotalCom =0;

            $commande->save();

            //det info produit cart from session
            $items = $request->session()->get('cart', []);

            $mantTotal =0;

            foreach ($items  as $item){

                //create ling commande
                $ligCommade = new LigneCommande();

                // get info product
               $produit = Produit::find($item["id"]);

               // reduire le quentite en stack de produit
               $produit->qteStockProd = $produit->qteStockProd - $item['qte'];

               $produit->save();

               // calculer mantant totale par produit et mantant total de la commande
                $mantNbProd = ($item['qte'] * $produit->prixVenteProd);
                $mantTotal = $mantTotal + $mantNbProd;

                //remplir les info de lig commandes
               $ligCommade->idCom  = $commande->idCom;
               $ligCommade->idProd = $produit->idProd;
               $ligCommade->nbProd = $item['qte'];
               $ligCommade->prixNbProd = $mantNbProd;

                $ligCommade->save();
            }

            // affecter le mantant finale de la commande
            $commande->mantTotalCom = $mantTotal ;
            $commande->save();

            // liber session cart
            $request->session()->forget('cart');
            $request->session()->put('count' , '0');

            return view('frontend.pages.thanks');
        }
    }

    public function mesCommandes(){
        $commandes = Commande::where('idClient' , '=' ,Auth::id())->get();

        //dd($commandes);
        return view('frontend.pages.mesCommande',['commandes'=>$commandes]);
    }


    public function mesCommandesValiderRecu($id){
        $commande = Commande::find($id);

        $commande->etatCom = 2;

        $commande->save();

        //dd($commandes);
        return redirect()->route('client.mescommandes');
    }


    public function test(Request $request,$id){
        $selection =  $request->session()->get('cart', []);

        $i=0;
        foreach ($selection as $item){
            $i++;
            if($item["id"] == $id){
                unset($selection[$i]);
                $request->session()->forget('cart');
                $request->session()->put('cart',$selection);

            }
        }

        return redirect()->route('shop.ddsession');
    }


    public function ddsession(Request $request){

        //dd(count($request->session()->get('cart', [])));
        dd($request->session()->get('cart', []));

        $cartItems = $request->session()->has('cart') ? $request->session()->get('cart') : null;


        $tabId =[];
        $tabQte = [];

        foreach ($cartItems as $item){
            array_push($tabId,$item['id']);
            array_push($tabQte,$item['qte']);
        }

        $produits = Produit::whereIn('idProd' , $tabId)->get();
        dd($produits);
    }
}
