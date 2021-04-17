<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class={{ (request()->is('admin')) ? 'active' : '' }}>
                    <a href="{{ route('admin.dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Manajemen Aspek</li><!-- /.menu-title -->
                <li class={{ (request()->is('admin/aspek*')) ? 'active' : '' }}>
                    <a href="{{ route('admin.aspek') }}"> <i class="menu-icon fa fa-table"></i>Indikator </a>
                </li>
                <li class="menu-title">Manajemen User</li><!-- /.menu-title -->
                <li class={{ (request()->is('admin/user')) ? 'active' : '' }}>
                    <a href="{{ route('user') }}"> <i class="menu-icon fa fa-cogs"></i>Kelola User </a>
                </li>
                <li class="menu-title">Keluar</li><!-- /.menu-title -->
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> <i class="menu-icon fa fa-power-off"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
