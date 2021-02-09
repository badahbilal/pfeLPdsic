<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset('/design/adminlte/dist/img/super-admin-icon.jpg')}}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{Auth::guard('admin')->user()->email}}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="{{asset('/design/adminlte/dist/img/super-admin-icon.jpg')}}" class="img-circle" alt="User Image">


                </li>

                <li class="user-footer">
                    <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">

                    <a class="btn box-primary bg-red" href="{{ url('/admin/logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>


</div>
                </li>
            </ul>
        </li>

    </ul>
</div>