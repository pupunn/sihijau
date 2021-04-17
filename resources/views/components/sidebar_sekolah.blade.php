<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">Personal</li><!-- /.menu-title -->
                <li class={{ (request()->is('sekolah')) ? 'active' : '' }}>
                    <a href="{{ route('sekolah.dashboard') }}"><i class="menu-icon fa fa-laptop"></i> Dashboard </a>
                </li>
                <li class="menu-title">Aspek Penilaian</li><!-- /.menu-title -->
                @foreach ($aspeks as $no => $asp)
                <li class={{ (request()->is('sekolah/jawaban*')) ? 'active' : '' }}>
                    <a href="{{ route('sekolah.jawaban') }}"> <i class="menu-icon fa fa-users"></i> {{ $no+1 }}.
                        {{ $asp->nama_aspek }} </a>
                </li>
                @endforeach
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
