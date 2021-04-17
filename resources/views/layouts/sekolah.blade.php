<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'GSR') }}</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-style></x-style>
</head>

<body>
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
                    <li class={{ (request()->is('sekolah/indikator/'.($no+1))) ? 'active' : '' }}>
                        <a href="{{ route('sekolah.indikator', $asp->id_aspek) }}">
                            {{ $asp->nama_aspek }} </a>
                    </li>
                    @endforeach
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
    <div id="right-panel" class="right-panel">
        <x-navbar></x-navbar>
        <div class="content">
            <div class="animated fadeIn">
                @yield('content')
            </div>
        </div>
        <div class="clearfix"></div>
        {{-- <x-footer></x-footer> --}}
    </div>
    @stack('script')
    <x-script></x-script>
</body>

</html>
