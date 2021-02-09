@extends('admin2.index')

@section('content')
    <div class="col-md-offset-1 col-md-8">
        <div class="box box-primary" style="    padding-bottom: 3px"><h3 class="text-center">Modifier produit</h3></div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Saisir les informations</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{'/admin/produits/'.$produit->idProd}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="nomProd">Nom produit</label>
                        <input value="{{ $produit->nomProd }}" type="text" class="form-control" id="nomProd" name="nomProd" placeholder="Enter nom produit">
                    </div>
                    <div class="form-group">
                        <label for="idCat">Select</label>
                        <select class="form-control" id="idCat" name="idCat">
                            @foreach($categories as $categorie )
                                <option value="{{$categorie->idCat}}" {{ $produit->idCat == $categorie->idCat ? 'selected=selected': ''}}>{{$categorie->nomCat}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descriptionProd">Description</label>
                        <textarea id="descriptionProd" class="form-control" rows="3" placeholder="Enter ..." name="descriptionProd" style="resize: none;">{{ $produit->descriptionProd }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="prixAchatProd">Prix d'achat du produit</label>
                        <input value="{{ $produit->prixAchatProd }}" type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="1" class="form-control" id="prixAchatProd" name="prixAchatProd">
                    </div>
                    <div class="form-group">
                        <label for="prixVenteProd">Prix de vente du produit</label>
                        <input value="{{ $produit->prixVenteProd }}" type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="1" class="form-control" id="prixVenteProd" name="prixVenteProd">
                    </div>
                    <div class="form-group">
                        <label for="qteStockProd">Quantite en stock</label>
                        <input value="{{ $produit->qteStockProd }}"pattern="\d{1,15}" type="number" min="1" step="1" class="form-control" id="qteStockProd" name="qteStockProd">
                    </div>
                    <div class="form-group">
                        <label for="photoProd">Photo du produit</label>
                        <input type="file" id="photoProd" name="photoProd">

                        <p class="help-block">Télécharger si tu veuw changer la photo</p>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection