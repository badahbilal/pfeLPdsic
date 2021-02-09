@extends('frontend.corps')


@section('content')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="/">Acceuil</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Boutique</strong>
                <span class="mx-2 mb-0">/</span> <strong class="text-black">{{isset($catName) ? $catName : 'all'}}</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-md-9 order-2">


                <div class="row mb-5">

                    @foreach($produits as $produit)
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="{{'/shop/produit/'.$produit->idProd}}">
                                    <img src="{{'http://127.0.0.1:8000/storage/produitsPhotos/'.$produit->photoProd}}" alt="Image placeholder" class="img-fluid img-thumbnail" width="253" height="253">
                                </a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="{{'/shop/produit/'.$produit->idProd}}">{{$produit->nomProd}}</a></h3>

                                <p class="text-primary font-weight-bold">{{$produit->prixVenteProd}} DH</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-md-12 text-center">
                        <div class="site-block-27">
                           {{$produits->links()}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 order-1 mb-5 mb-md-0">
                <div class="border p-4 rounded mb-4" style="max-height: 500px; overflow-y: scroll;">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1"><a href="{{'/shop'}}" class="d-flex"><span>Tous les articles</span></a></li>
                        @foreach($categories as $categorie)
                        <li class="mb-1"><a href="{{'/shop/categories/'.$categorie->idCat}}" class="d-flex"><span>{{$categorie->nomCat}}</span></a></li>
                            @endforeach
                    </ul>
                </div>

                <div class="border p-4 rounded mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Rechercher personalisé</h3>
                    <ul class="list-unstyled mb-0">
                        <form action="/shop/personaliser" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="idCat">Choisissez le catégorie</label>
                                <select class="form-control" id="idCat" name="idCat">
                                    @foreach($categories as $categorie )
                                        <option value="{{$categorie->idCat}}" {{ old('idCat') == $categorie->idCat ? 'selected=selected': ''}}>{{$categorie->nomCat}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="minPrix">Prix minimal</label>
                                <input value="1" type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="1" class="form-control" id="minPrix" name="minPrix">
                            </div>
                            <div class="form-group">
                                <label for="maxPrix">Prix maximal</label>
                                <input value="1" type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="1" class="form-control" id="maxPrix" name="maxPrix">
                            </div>

                            <input type="submit" value="rechercher" class="btn btn-primary">
                        </form>

                    </ul>
                </div>

            </div>
        </div>


    </div>
</div>

@endsection