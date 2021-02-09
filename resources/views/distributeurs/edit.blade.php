@extends('admin2.index')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="box  box-primary" style="    padding-bottom: 3px"><h3 class="text-center">Ajouter distributeur</h3></div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Saisir les informations</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{"/admin/distributeurs/".$distributeur->idDis}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="nomDis">Nom distributeur</label>
                        <input value="{{explode(' ',$distributeur->nameDis)[0]}}" type="text" class="form-control" id="nomDis" name="nomDis" placeholder="Enter nom">
                    </div>

                    <div class="form-group">
                        <label for="prenomDis">Prénom distributeur</label>
                        <input value="{{explode(' ',$distributeur->nameDis)[1]}}" type="text" class="form-control" id="prenomDis" name="prenomDis" placeholder="Enter prénom">
                    </div>

                    <div class="form-group">
                        <label for="adrsDis">Téléphone distributeur</label>
                        <input value="{{$distributeur->teleDis}}" type="text" class="form-control" id="teleDis" name="teleDis" placeholder="Enter téléphone">
                    </div>

                    <div class="form-group">
                        <label for="adrsDis">Adresse distributeur</label>
                        <input value="{{$distributeur->adrsDis}}" type="text" class="form-control" id="adrsDis" name="adrsDis" placeholder="Enter Adresse">
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>

@endsection