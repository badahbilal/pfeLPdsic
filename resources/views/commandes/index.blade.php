@extends('admin2.index')

@section('content')
    <div class="box box-primary" style="    padding-bottom: 3px"><h3 class="text-center">Liste de tous les commandes</h3></div>

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="dataTableProduis" style="width:100%" class="order-column mdl-data-table table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Distributeur</th>
                    <th>Mantatnt total</th>
                    <th>Etat commande</th>
                    <th>Date commande</th>
                    <th>Affecter Distributeur</th>
                   {{-- <th>Prix d'achat </th>
                    <th>Prix de vente</th>
                    <th>Quantité</th>
                    <th>Modifier / Supprimer</th>--}}
                </tr>
                </thead>
                <tbody>

                @foreach($commandes as $commande)
                    <tr>
                        <td>{{$commande->idCom}}</td>
                        <td>{{$commande->client->nomClient.' '.$commande->client->prenomClient}}</td>
                        <td>{{$commande->distributeur["nameDis"]}}</td>
                        <td>{{$commande->mantTotalCom}}</td>
                        <td class="text-center">
                        @if($commande->etatCom == 2)
                            <span class="label label-success" style="display: inline-block;padding: 11px;">Commande Livré</span>
                            @elseif($commande->etatCom == 1)
                                <span class="label label-warning" style="display: inline-block;padding: 11px;">Commande Envoyé</span>
                                @elseif($commande->etatCom == 0)
                                    <span class="label label-danger" style="display: inline-block;padding: 11px;">Commande Non Livré</span>


                        @endif
                        </td>
                        <td>{{$commande->dateCom}}</td>

                        <td>
                            @if($commande->etatCom==0)

                                <a href="{{'/admin/commandes/affecterDis/'.$commande->idCom}}" >
                                    <button class="btn btn-success" >
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                        Affecter distributeur
                                    </button>
                                </a>

                                @endif
                        </td>
                      {{--  <td>
                            <a href="{{'/admin/produits/'.$produit->idProd. '/edit'}}" >
                                <button class="btn btn-success" >
                                    <span class="glyphicon glyphicon-edit"></span>
                                    modifier
                                </button>
                            </a>

                            <form style="display: inline-block;" action="{{route('admin.produits.destroy',['id'=>$produit->idProd])}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button  style="display: inline-block;" onclick="return confirm('Voullez vous veraiment supprimer?')" type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-floppy-remove"></span>
                                    Supprimer
                                </button>
                            </form>
                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Distributeur</th>
                    <th>Mantatnt total</th>
                    <th>Etat commande</th>
                    <th>Date commande</th>
                    <th>Affecter Distributeur</th>
                </tr>
                </tfoot>
            </table>

        </div>
        <!-- /.box-body -->
    </div>




@endsection
