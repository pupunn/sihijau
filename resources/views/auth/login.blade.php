@extends('layouts.login')
@section('content')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="{{ route('login') }}" method="POST" class="sign-in-form">
                @csrf
                <h2 class="title">Sign in</h2>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Email"
                        autocomplete="email" autofocus />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" placeholder="Password" name="password" required
                        autocomplete="current-password" />
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label> --}}
                        </div>
                    </div>
                </div>
                <button class="btn solid" type="submit">Login</button>
            </form>
            {{-- <form action="{{ route('sekolah.daftar') }}" method="POST" enctype="multipart/form-data"
            class="sign-up-form">
            @csrf
            <table class="table" align="center" cellpadding="10">
                <title class="title-reg">Register</title>
                <tr>
                    <td>NPSN</td>
                    <td>
                        <div class="input-field">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                placeholder="" autocomplete="email" autofocus />
                        </div>
                    </td>
                    <td>
                        <div class="btn-wrapper">
                            <button type="button" class="custom-button">Upload Sertifikat NPSN</button>
                            <input type="file" id="file_npsn" name="file_npsn" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Nama Sekolah</td>
                    <td class="input-field"><input type="text" id="nama_sekolah" name="nama_sekolah" placeholder=""
                            autocomplete="nama_sekolah" value="{{ old('nama_sekolah') }}" required>
                    </td>
                </tr>
                <tr>
                    <td>Alamat Sekolah</td>
                    <td class="input-field"><input type="text" id="alamat_sekolah" name="alamat_sekolah" placeholder=""
                            value="{{ old('alamat_sekolah') }}" required autocomplete="alamat_sekolah"></td>
                </tr>
                <tr>
                    <td>Nama Operator Sekolah</td>
                    <td class="input-field"><input type="text" id="nama_operator" name="nama_operator" placeholder=""
                            value="{{ old('nama_operator') }}" required autocomplete="nama_operator">
                    </td>
                    <td><input type="file" id="real-file" hidden="hidden" />
                        <button type="button" id="custom-button">Choose File</button></td>
                </tr>
                <tr>
                    <td>Telepon Operator</td>
                    <td class="input-field"><input type="text" id="telepon_operator" name="telepon_operator"
                            placeholder="" value="{{ old('telepon_operator') }}" required
                            autocomplete="telepon_operator"></td>
                </tr>
                <tr>
                    <td>Email Operator</td>
                    <td class="input-field"><input type="email" id="email_operator" name="email_operator" required
                            autocomplete="email_operator" placeholder="" value="{{ old('email_operator') }}"></td>
                </tr>
                <tr>
                    <td><label>Letak Sekolah</label></td>
                    <td>
                        <div class="check-container">
                            <input type="radio" id="pusat-kota" name="letak_sekolah" value="1" checked />
                            &nbsp;
                            <span for="pusat-kota">Pusat</span>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input type="radio" id="tepi-kota" name="letak_sekolah" value="2"
                                {{ old('letak_sekolah == 2') ? 'checked' : '' }} />
                            &nbsp;
                            <span for="tepi-kota">Tepi Kota</span>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            <br>
                            <input type="radio" id="pedesaan" name="letak_sekolah" value="3"
                                {{ old('letak_sekolah == 3') ? 'checked' : '' }} />
                            &nbsp;
                            <span for="pedesaan">Pedesaan</span>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                        </div>
                    </td>
                <tr>
                    <td><label></label></td>
                    <td>
                        <div class="btn-wrapper">
                            <button type="button" class="custom-button">Upload Peta Sekolah</button>
                            <input type="file" id="file_peta_lokasi" name="file_peta_lokasi" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label></label></td>
                    <td><input type="image" id="real-file" hidden="hidden" />
                        <button type="button" id="custom-button">Foto Sekolah</button></td>
                </tr>
                </tr>
                <tr>
                    <td>Luas Sekolah</td>
                    <td class="input-field"><input type="text" id="luas-sekolah" name="luas-sekolah" placeholder=""
                            value="{{ old('') }}">
                    </td>
                    <td><input type="DOCTYPE" id="real-file" hidden="hidden" />
                        <button type="button" id="custom-button">Choose File</button></td>
                </tr>
                <tr>
                    <td>Luas Terbangun</td>
                    <td class="input-field"><input type="text" id="luas-terbangun" name="luas-terbangun" placeholder=""
                            value="{{ old('') }}"></td>
                    <td><input type="DOCTYPE" id="real-file" hidden="hidden" />
                        <button type="button" id="custom-button">Choose File</button></td>
                </tr>
                <tr>
                    <td>Luas Terbuka Hijau</td>
                    <td class="input-field"><input type="text" id="luas-terbuka" name="luas-terbuka" placeholder=""
                            value="{{ old('') }}">
                    </td>
                    <td><input type="DOCTYPE" id="real-file" hidden="hidden" />
                        <button type="button" id="custom-button">Choose File</button></td>
                </tr>
                <tr>
                    <td>Jumlah Guru dan Karyawan</td>
                    <td class="input-field"><input type="text" id="jumlah-guru" name="jumlah-guru" placeholder=""
                            value="{{ old('') }}">
                    </td>
                    <td><input type="DOCTYPE" id="real-file" hidden="hidden" />
                        <button type="button" id="custom-button">Choose File</button></td>
                </tr>
                <tr>
                    <td>Jumlah Siswa</td>
                    <td class="input-field"><input type="text" id="jumlah-siswa" name="jumlah-siswa" placeholder=""
                            value="{{ old('') }}">
                    </td>
                    <td><input type="DOCTYPE" id="real-file" hidden="hidden" />
                        <button type="button" id="custom-button">Choose File</button></td>
                </tr>
                <tr>
            </table>
            <input type="submit" class="btn-reg" value="Register" />
            </form> --}}
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Belum daftar ?</h3>
                <p>
                    Silahkan mendaftarkan sekolah Anda di sini !
                </p>
                <form action="{{ route('sekolah.daftar') }}">
                    <button class="btn transparent" id="sign-up-btn">Register</button>
                </form>
            </div>
            <img src="{{ asset('images/logo-gsr2.png') }}" class="image" alt="" />
        </div>
        {{-- <div class="panel right-panel">
            <div class="content">
                <h3>Sudah mendaftar ?</h3>
                <p>
                    Silahkan log in di sini !</p>
                <button class="btn transparent" id="sign-in-btn">Sign in</button>
            </div>
            <img src="{{ asset('assets/img/1543687508.svg') }}" class="image" alt="" />
    </div> --}}
</div>
</div>
<script>
    const sign_in_btn = document.querySelector('#sign-in-btn');
    const sign_up_btn = document.querySelector('#sign-up-btn');
    const container = document.querySelector('.container');

    // sign_up_btn.addEventListener('click', () => {
    // container.classList.add('sign-up-mode');
    // location.href = {{ route('sekolah.daftar') }};
    // });

    // sign_in_btn.addEventListener('click', () => {
    // container.classList.remove('sign-up-mode');
    // });
</script>
<script type="text/javascript">
    const realFileBtn = document.getElementById("real-file");
    const customBtn = document.getElementById("custom-button");

    //  customBtn.addEventListener("click", function() {
    //    realFileBtn.click();
    //  });
</script>

@endsection
