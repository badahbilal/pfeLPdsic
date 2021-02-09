@extends('admin2.index')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="box box-primary" style="    padding-bottom: 3px"><h3 class="text-center">Ajouter categories</h3></div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ajouter un catégorie</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/admin/categories" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="nomCat">Nom Catégorie</label>
                        <input type="text" class="form-control" id="nomCat" name="nomCat" placeholder="Enter nom catégorie">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

@endsection
