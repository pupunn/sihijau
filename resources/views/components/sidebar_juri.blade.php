<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">Personal</li><!-- /.menu-title -->
                <li class={{ (request()->is('juri')) ? 'active' : '' }}>
                    <a href="{{ route('juri.dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Aspek Penilaian</li><!-- /.menu-title -->
                <li class={{ (request()->is('juri/peserta*')) ? 'active' : '' }}>
                    <a href="{{ route('juri.peserta') }}"> <i class="menu-icon fa fa-users"></i> Peserta GSR </a>
                </li>
                <li class={{ (request()->is('juri/download')) ? 'active' : '' }}>
                    <a href="{{ route('juri.download.excel') }}"> <i class="menu-icon fa fa-download"></i> Unduh Laporan
                        Excel </a>
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
