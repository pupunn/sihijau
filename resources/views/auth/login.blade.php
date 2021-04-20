@extends('layouts.login')
@section('content')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="{{ route('login') }}" class="sign-in-form" method="POST">
                @csrf
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                        autofocus />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Password" />
                </div>
                <div class="button">
                    <input type="button" value="Download Panduan"
                        onclick='location.href=&quot;{{ asset("storage/PANDUAN UNNES GSR 2021.pdf") }} &quot;'
                        class="btn linear" />
                    <button type="submit" class="btn solid"> Login </button>
                </div>
            </form>
            <form action="{{ route('sekolah.daftar') }}" class="sign-up-form">
                <h2 class="title">Register</h2>
                <input type="submit" class="btn" value="Register" />
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Belum daftar ?</h3>
                <p>
                    Silahkan mendaftarkan sekolah Anda di sini !
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    Sign up
                </button>
            </div>
            <img src="{{ asset('assets/img/UnnesGSR.png') }}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Sudah mendaftar ?</h3>
                <p>
                    Silahkan log in di sini !
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Sign in
                </button>
            </div>
            <img src="{{ asset('assets/img/UnnesGSR.png') }}" class="image" alt="" />
        </div>
    </div>
</div>

@endsection
