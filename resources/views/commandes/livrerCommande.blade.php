@extends('admin2.index')

@section('content')

    <div class="col-md-offset-3 col-md-6">
    <div class="box box-primary" style="    padding-bottom: 3px"><h3 class="text-center">Affecter le distributeur a la commande sélectioner (N : {{$id}})</h3></div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Affecter un distributeur</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="/admin/commandes/ajouterDisToCom" method="POST">
            @csrf

            <input value="{{$id}}" type="hidden" class="form-control" id="idCom" name="idCom" >
            <div class="form-group">
                <label for="idDis">Selection distributeur</label>
                <select class="form-control" id="idDis" name="idDis">
                    @foreach($distributeurs as $distributeur )
                        <option value="{{$distributeur->idDis}}" >{{$distributeur->nameDis}}</option>
                    @endforeach

                </select>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Affecter</button>
            </div>
        </form>
    </div>
    </div>
    @endsection
