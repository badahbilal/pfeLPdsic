@extends('admin2.index')

@section('content')
    <div class="box box-primary" style="    padding-bottom: 3px"><h3 class="text-center">listes des clients</h3></div>

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="dataTableProduis" style="width:100%" class="order-column mdl-data-table table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Client</th>
                    <th>Date Naissance</th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Date de register</th>
                    <th>Commandes</th>
                    {{--<th>Quantité</th>
                    <th>Modifier / Supprimer</th>--}}
                </tr>
                </thead>
                <tbody>

                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>{{$client->nomClient.' '.$client->prenomClient}}</td>
                        <td>{{$client->dateNaissClient}}</td>
                        <td>{{$client->adrsClient}}</td>
                        <td>{{$client->teleClient}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->created_at}}</td>
                        <td>
                            <a href="{{'/admin/client/commandes/'.$client->id}}" >
                                <button class="btn btn-success" >
                                    <span class="glyphicon glyphicon-search"></span>
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                    Afficher commandes
                                </button>
                            </a>
                        </td>

              {{--          <td>
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
                        </td>
                    </tr>--}}
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Client</th>
                    <th>Date Naissance</th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Date de register</th>
                    <th>Commandes</th>
                </tr>
                </tfoot>
            </table>

        </div>
        <!-- /.box-body -->
    </div>



@endsection