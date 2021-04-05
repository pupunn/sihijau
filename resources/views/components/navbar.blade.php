<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand img-fluid" href="./"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ asset('images/logo2.png') }}" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">

                <div class="dropdown for-notification">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="notification"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="btn btn-primary">Periode 2020-2021</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="periode">
                        <a class="dropdown-item media" href="#">
                            <p>Periode 2019-2020</p>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <i class="fa fa-check"></i>
                            <p>Periode 2020-2021</p>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <p>Periode 2021-2022</p>
                        </a>
                    </div>
                </div>

            </div>

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{ asset('images/admin.jpg') }}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">

                    <a class="nav-link" href={{ route("logout") }} onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-power -off"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
