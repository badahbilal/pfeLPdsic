@include('admin2.layouts.header')
@include('admin2.layouts.navbar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="height: 1000px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tableau de bord

        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        @include('admin2.layouts.message')
        @if (session('status'))
            <div class="alert alert-success">
               <h4> {{ session('status') }}</h4>
            </div>
        @endif

        @include('includes.message')
        @yield('content')
    </section>
    <!-- /.content -->
</div>
@include('admin2.layouts.footer')


