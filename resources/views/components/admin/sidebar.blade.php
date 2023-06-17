
@role('Admin')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-white ml-3">KesehatanApps</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar row-auto w-full">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{{asset('dist/img/user2-160x160.jpg')}}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <p class="d-block text-white">{{ \Auth::user()->name}}</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('spesialis.index')}}" class="nav-link {{ Request::is('spesialis*') ? 'active':''}}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Spesialis</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('rumahsakit.index')}}" class="nav-link {{ Request::is('rumahsakit*') ? 'active':''}}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Rumah Sakit</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('apotek.index')}}" class="nav-link {{ Request::is('apotek*') ? 'active':''}}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Apotek</p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('article.index')}}" class="nav-link {{ Request::is('article*') ? 'active':''}}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Article</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('role.index')}}" class="nav-link {{ Request::is('role*') ? 'active':''}}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Role</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index')}}" class="nav-link {{ Request::is('users*') ? 'active':''}}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>

            </ul>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link bg-danger">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <form action="{{route('logout')}}" id="logout-form" style="display:none;" method="post">@csrf</form>
    <!-- /.sidebar -->
</aside>

@endrole




@role('Dokter')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-white ml-3">KesehatanApps</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar row-auto w-full">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{{asset('dist/img/user2-160x160.jpg')}}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <p class="d-block text-white">{{ \Auth::user()->name}}</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('article.index')}}" class="nav-link {{ Request::is('article*') ? 'active':''}}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Article</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link bg-danger">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <form action="{{route('logout')}}" id="logout-form" style="display:none;" method="post">@csrf</form>
    <!-- /.sidebar -->
</aside>
@endrole
