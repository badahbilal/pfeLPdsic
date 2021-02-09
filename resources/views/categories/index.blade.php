@extends('admin2.index')

@section('content')


        <div class="box box-primary" style="    padding-bottom: 3px">
            <h3  class="text-center">Les Categories</h3>

        </div>
        <div style="margin-bottom: 10px;">
            <a style="padding: 13px;font-size: 17px;font-weight: bold;" href="categories/create" class="btn btn-primary">
                <span class="glyphicon glyphicon-plus"></span>
                Ajouter catégorie
            </a>
        </div>
        <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Responsive Hover Table</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table id="dataTableProduis" style="width:100%" class="order-column mdl-data-table table table-bordered table-striped">
<thead>
                        <tr>
                                <th>ID Catégorie</th>
                                <th>Nom Catégorie</th>
                                <th></th>

                            </tr>
</thead>
                            <tbody>
                           @foreach($categories as $categorie)

                                <tr>
                                    <td>{{$categorie->idCat}}</td>
                                    <td>{{$categorie->nomCat}}</td>
                                    <td class="text-center p">
                                        <a href="{{"/admin/categories/".$categorie->idCat."/edit"}}">
                                            <button style="width : 25%;margin-right: 5px;display: inline-block;" type="button" class="btn btn-block btn-warning">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                Modifier
                                            </button>
                                        </a>


                                        <form style="display: inline-block;" action="{{route('admin.categories.destroy',['id'=>$categorie->idCat])}}" method="POST">
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
                            <th>ID Catégorie</th>
                            <th>Nom Catégorie</th>
                            <th></th>
                            </tfoot>
                        </table>
                        {{--{{$categories->links()}}--}}
                    </div>
                    <!-- /.box-body -->

        </div>




@endsection
