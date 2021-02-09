@extends('admin2.index')

@section('content')

    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Modifier un catégorie</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{"/admin/categories/".$categorie->idCat}}" method="POST">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="nomCat">Nom Catégorie</label>
                        <input type="text" value="{{$categorie->nomCat}}" class="form-control" id="nomCat" name="nomCat" placeholder="Enter nom catégorie">
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
