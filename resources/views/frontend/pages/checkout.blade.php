@extends('frontend.corps')


@section('content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Acceuil</a> <span class="mx-2 mb-0">/</span> <a href="/shop/showcart">Panier</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">La caisse</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Information du client</h2>
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_fname" name="c_fname" value="{{Auth::user()->nomClient}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">Prenom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_lname" name="c_lname" value="{{Auth::user()->prenomClient}}" disabled>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Addresse <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Street address" value="{{Auth::user()->adrsClient}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label for="c_email_address" class="text-black">Adresse email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_email_address" name="c_email_address" value="{{Auth::user()->email}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="c_phone" class="text-black">Téléphone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number" value="{{Auth::user()->teleClient}}" disabled>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">


                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Votre commande</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                    <th>Produit</th>
                                    <th>Total</th>
                                    </thead>
                                    <tbody>

                                    @foreach($produits as $produit)
                                        <tr>
                                            <td>{{$produit->nomProd}}
                                                <strong class="mx-2">x</strong>
                                                @foreach($cartItems as $item)
                                                    @if($produit->idProd == $item['id'] )
                                                      <strong>  {{$item['qte']}}</strong>

                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                            @foreach($cartItems as $item)
                                                @if($produit->idProd == $item['id'] )

                                                    {{($produit->prixVenteProd * $item['qte']) }} DH
                                                @endif
                                            @endforeach
                                                </td>
                                        </tr>

                                    @endforeach


                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Total de la commande</strong></td>
                                        <td class="text-black font-weight-bold"><strong>{{$montantTotale}} DH</strong></td>
                                    </tr>
                                    </tbody>
                                </table>


                                <div class="form-group">
                                    <a href="/shop/passercommande">
                                        <button class="btn btn-primary btn-lg py-3 btn-block">Passer la commande</button>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>

@endsection