<header class="main-header">
    <!-- Logo -->
    <a href="/admin/home" class="logo">

        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>MonSouk </b>Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        @include('admin2.layouts.menu')
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="height: 1050px">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/design/adminlte/dist/img/super-admin-icon.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::guard('admin')->user()->email}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>



        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Tableau de bord</li>
            <li>
                <a href="/admin/home">
                    <i class="fa fa-fw fa-home"></i> <span>Acceuil</span>
                    <span class="pull-right-container">

            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-shopping-cart"></i> <span>Commandes</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/commandes/all"><i class="fa fa-circle-o"></i>Toutes les commandes</a></li>
                    <li><a href="/admin/commandes/allNoLivre"><i class="fa fa-circle-o"></i>Commandes non livrées</a></li>
                    <li><a href="/admin/commandes/allsend"><i class="fa fa-circle-o"></i>Commandes envoyées</a></li>
                    <li><a href="/admin/commandes/allLivre"><i class="fa fa-circle-o"></i>Commandes livrées</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Catégories</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/admin/categories">
                            <i class="fa fa-fw fa-list"></i>
                            Liste des catégories
                        </a>
                    </li>
                    <li>
                        <a href="/admin/categories/create">
                            <i class="fa fa-fw fa-plus"></i>
                            Ajouter une catégorie
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i> <span>Produits</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/admin/produits">
                            <i class="fa fa-fw fa-list"></i>
                            Liste des produits
                        </a>
                    </li>
                    <li>
                        <a href="/admin/produits/create">
                            <i class="fa fa-fw fa-plus"></i>
                            Ajouter un produit
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-users"></i> <span>Distributeurs</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/admin/distributeurs">
                            <i class="fa fa-fw fa-list"></i>
                            Liste des distributeurs
                        </a>
                    </li>
                    <li>
                        <a href="/admin/distributeurs/create">
                            <i class="fa fa-fw fa-plus"></i>
                            Ajouter un distributeur
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-users"></i> <span>Clients enregistrés</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/admin/client">
                            <i class="fa fa-fw fa-list"></i>
                            Liste des clients
                        </a>
                    </li>
                </ul>
            </li>
            <li><a href="/admin/statistique"><i class="fa fa-pie-chart"></i> <span>Statistiques</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>