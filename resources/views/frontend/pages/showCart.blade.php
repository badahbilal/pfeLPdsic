@extends('frontend.corps')


@section('content')

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="product-thumbnail">Image</th>
                            <th class="product-name">Produit</th>
                            <th class="product-price">Prix</th>
                            <th class="product-quantity">Quantité</th>
                            <th class="product-total">Total</th>
                            <th class="product-remove">Modifier</th>
                            <th class="product-remove">Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($produits as $produit)
                        <tr>
                            <td class="product-thumbnail">
                                <img src="{{'http://127.0.0.1:8000/storage/produitsPhotos/'.$produit->photoProd}}" alt="Image" class="img-fluid">
                            </td>
                            <td class="product-name">
                                <h2 class="h5 text-black">{{$produit->nomProd}}</h2>
                            </td>
                            <td>{{$produit->prixVenteProd}}</td>
                            <td>
                                <div class="input-group mb-3" style="max-width: 120px;">
                                  {{--  <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                    </div>--}}
                                    @foreach($cartItems as $item)
                                        @if($produit->idProd == $item['id'] )
                                    <input disabled type="text" class="form-control text-center" value="{{$item['qte']}}" placeholder=""
                                           aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        @endif
                                    @endforeach
                                    {{--<div class="input-group-append">
                                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                    </div>--}}
                                </div>

                            </td>
                            @foreach($cartItems as $item)
                                @if($produit->idProd == $item['id'] )

                                    <td>{{($produit->prixVenteProd * $item['qte']) }} DH</td>
                                @endif
                            @endforeach

                            <td><a href="{{'/shop/produit/'.$produit->idProd}}" class="btn btn-warning btn-sm">Modifier</a></td>
                            <td><a href="{{"/shop/showcart/delete/".$produit->idProd}}" onclick="return confirm('Voullez vous veraiment supprimer?')" class="btn btn-danger btn-sm">Supprimer</a></td>
                        </tr>

                    @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>


            <div class="col-md-4 offset-4 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-12">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <a href="/shop" >
                                    <button class="btn btn-primary btn-lg py-3 btn-block" >Continuer vos achats</button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3  style="color:black" class="text-center h4 text-uppercase">Total à payer</h3>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">{{$montantTotale}} DH</strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="/shop/checkout">
                                    <button class="btn btn-primary btn-lg py-3 btn-block">Passer à la caisse</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection