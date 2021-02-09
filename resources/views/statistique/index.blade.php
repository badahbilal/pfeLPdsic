@extends('admin2.index')

@section('content')
<div class="box box-primary" style="    padding-bottom: 3px"><h3 class="text-center">Les statistiques</h3></div>

<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h4><b>Qauntité en stock</b></h4>
                    <h4><b>des produits</b></h4>
                    <p></p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/admin/statistique/qteStock" class="small-box-footer">Afficher le graphe <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-4 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h4><b>Nombre du commande</b></h4>
                    <h4><b>par jour</b></h4>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/admin/statistique/nbComDate" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-md-4 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h4><b>Somme des mantants total</b></h4>
                    <h4><b>des commandes par jour</b></h4>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/admin/statistique/argentTotalDate" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Nombre du commande par période</h3>
                </div>
                <div class="box-body">
                   <form action="/admin/statistique/nbComDatePeriode" method="post">
                       @csrf
                       <label>Date debut</label>
                       <input required name="dateDebut" class="form-control" type="date" placeholder="Default input">
                       <label>Date fin</label>
                       <input required name="dateFin" class="form-control" type="date" placeholder="Default input"><br>
                       <input class="btn btn-primary" type="submit" value="Rechercher">
                   </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Somme des mantants total des commandes par période</h3>
                </div>
                <div class="box-body">
                    <form action="/admin/statistique/argentTotalDatePeriode" method="post">
                        @csrf
                        <label>Date debut</label>
                        <input required name="dateDebut"  class="form-control" type="date" placeholder="Default input">
                        <label>Date fin</label>
                        <input required name="dateFin" class="form-control" type="date" placeholder="Default input"><br>
                        <input class="btn btn-primary" type="submit" value="Rechercher">
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

</section>
    @endsection