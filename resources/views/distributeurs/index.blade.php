@extends('admin2.index')

@section('content')
    <div class="box box-primary" style="    padding-bottom: 3px"><h3 class="text-center">liste des distributeurs</h3></div>
    <div style="margin-bottom: 10px;">
        <a style="padding: 13px;font-size: 17px;font-weight: bold;" href="/admin/distributeurs/create" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus"></span>
            Ajouter Distributeur
        </a>
    </div>
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
                    <th>Nom complet</th>
                    <th>Téléphpne</th>
                    <th>Adresse</th>
                    <th>Modifier / Supprimer</th>
                </tr>
                </thead>
                <tbody>

                @foreach($distributeurs as $distributeur)
                    <tr>
                        <td>{{ $distributeur->idDis }}</td>
                        <td>{{ $distributeur->nameDis }}</td>
                        <td>{{ $distributeur->teleDis }}</td>
                        <td>{{ $distributeur->adrsDis }}</td>

                        <td>
                            <a href="{{'/admin/distributeurs/'.$distributeur->idDis. '/edit'}}" >
                                <button class="btn btn-warning" >
                                    <span class="glyphicon glyphicon-edit"></span>
                                    modifier
                                </button>
                            </a>

                            <form style="display: inline-block;" action="{{route('admin.distributeurs.destroy',['id'=>$distributeur->idDis])}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button  style="display: inline-block;" onclick="return confirm('Voullez vous veraiment supprimer?')" type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-floppy-remove"></span>
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nom complet</th>
                    <th>Téléphpne</th>
                    <th>Adresse</th>
                    <th>Modifier / Supprimer</th>

                </tr>
                </tfoot>
            </table>

        </div>
        <!-- /.box-body -->
    </div>



@endsection

