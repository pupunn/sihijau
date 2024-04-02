@extends('layouts.login')
@section('content')
<div class="container-2">
    <div class="form-2">
        <div class="contact-info">
            <h3 class="title-2">Contact Us</h3>
            <p class="text-2">
                Informasi lebih lanjut bisa menghubungi contact di bawah ini:
            </p>

            <div class="info">
                <div class="information">
                    <img src={{ asset('assets/img/location.png') }} class="icon-2" alt="" />
                    <p>Gedung LP2M Lantai 1 Kampus Unnes Sekaran Gunungpati</p>
                </div>
                <div class="information">
                    <img src={{ asset('assets/img/email.png') }} class="icon-2" alt="" />
                    <p>konservasi@mail.unnes.ac.id</p>
                </div>
                <div class="information">
                    <img src={{ asset('assets/img/globe-grid.png') }} class="icon-2" alt="" />
                    <p>http://konservasi.unnes.ac.id/</p>
                </div>
                <div class="information">
                    <img src={{ asset('assets/img/phone.png') }} class="icon-2" alt="" />
                    <p>+6224-85080091, 8508092, 331499439 ext 1088 Faks +62248508088</p>
                </div>
            </div>
        </div>
        <div>
            <img src={{ asset('assets/img/UnnesGSR.png') }} style="width:90%; position: relative;" />
        </div>
    </div>
</div>
@endsection
