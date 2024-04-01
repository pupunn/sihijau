@extends('layouts.login')
@section('content')
<div class="container-jumbotron" style="margin-left:35px; margin-top:5%">
    <h1 class="display-3" style="text-align:center">Terima Kasih !</h1>
    <img class="img-2" src="{{ asset('images/low.jpeg') }}" style="margin-left:41%; align-content:center; width:20%">
    <p class="lead" style="text-align:center"><strong>Pendaftaran berhasil dilakukan</strong>, silahkan tunggu email
        kami setelah diverifikasi untuk melakukan login
        <br><br><br>
        <div class="lead2-form" style="object-position: center;">
            {{-- <p class="lead2" style="text-align:center; bottom:10px; text-decoration:none">Having trouble? <a href=""
                    style="text-decoration:none">Contact Us</a></p> --}}
            <button class="btn2" type="submit"
                style="width:150px; background-color:#20dbc2; border:none; outline:none; height:50px; border-radius:50px; color:#fff; text-transform:uppercase; font-weight:600; cursor:pointer; padding:10px; transition:0.5s; text-decoration:none; align-content: center; text-align: center; object-position: center; margin-left: 50%; transform: translateX(-50%)"><a
                    href="{{ route('login') }}" style="text-decoration:none; color:#fff;">Login</a></button>
        </div>
</div>

@endsection
