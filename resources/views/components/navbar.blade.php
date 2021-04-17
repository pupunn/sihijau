@php
use App\Models\Periode as Periode;
use App\Models\User as User;

$periode = Periode::all();
$periodeDefault = Periode::where('is_default', 1)->first();

if (session("periode") == null) {
session(["periode" => $periodeDefault->id_periode]);

User::where('id', Auth::user()->id)
->where('email', Auth::user()->email)
->update(['id_periode' => session("periode")]);
}
@endphp
<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand img-fluid" href="./"><img style="width: 17%; height: 17%"
                    src="{{ asset('images/logo-gsr.jpeg') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img style="width: 17%; height: 17%"
                    src="{{ asset('images/logo-gsr.jpeg') }}" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">

                <div class="dropdown for-notification">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="notification"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="btn btn-primary">Periode
                            @foreach ($periode as $p)
                            {{ $p->id_periode == session('periode') ? $p->nama : '' }}
                            @endforeach
                        </span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="periode">
                        <form action="{{ route('ubah.periode') }}" method="post">
                            @csrf
                            <select name="periode" id="periode" class="form-control">
                                @foreach ($periode as $period)
                                <option value="{{ $period->id_periode }}"
                                    {{ $period->id_periode == session("periode") ? 'selected' : '' }}>
                                    {{ $period->nama }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
                            {{-- <a class="dropdown-item media" href="#">
                                <p>Periode 2019-2020</p>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <i class="fa fa-check"></i>
                                <p>Periode 2020-2021</p>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <p>Periode 2021-2022</p>
                            </a> --}}

                        </form>
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
                    document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
