
@extends('frontend.corps')


@section('content')
    @if (session('status'))
        <div class="alert alert-danger">
            <h4> {{ session('status') }}</h4>
        </div>
    @endif

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Acceuil</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{$produit->nomProd}}</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{'http://127.0.0.1:8000/storage/produitsPhotos/'.$produit->photoProd}}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="text-black">{{$produit->nomProd}}</h2>
                    <p>{{$produit->descriptionProd}}</p>
                     <p><strong class="text-primary h4">{{$produit->prixVenteProd}} DH</strong></p>
                    <form action="/shop/addToCart" method="POST">
                        @csrf
                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="hidden" name="idProd" value="{{$produit->idProd}}">
                            <input name="qte" min="1" step="1" max="{{$produit->qteStockProd}}" type="number" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                            <div>
                                <p>{{'Quantité maximale est : '.$produit->qteStockProd}} </p>
                            </div>
                        </div>

                    </div>
                    <p><button type="submit" class="buy-now btn btn-sm btn-primary">Ajouter à la carte</button></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection