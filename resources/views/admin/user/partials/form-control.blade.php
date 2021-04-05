<div class="form-group row">
    <label for="npsn" class="col-md-4 col-form-label text-md-right">{{ __('NPSN') }}</label>

    <div class="col-md-6">
        <input id="npsn" type="text" class="form-control @error('npsn') is-invalid @enderror" name="npsn"
            value="{{ old('npsn') }}" autocomplete="npsn" autofocus required
            data-validation-required-message="This field is required">

        <div class="mt-3">
            <input type="file" class="form-control-file" id="file_npsn" name="file_npsn" required
                data-validation-required-message="This field is required">
            <small class="text-small">Upload sertifikat NPSN</small>
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="nama_sekolah" class="col-md-4 col-form-label text-md-right">{{ __('Nama Sekolah') }}</label>

    <div class="col-md-6">
        <input id="nama_sekolah" type="text" class="form-control @error('nama_sekolah') is-invalid @enderror"
            name="nama_sekolah" value="{{ old('nama_sekolah') }}" autocomplete="nama_sekolah" required
            data-validation-required-message="This field is required">
    </div>
</div>

<div class="form-group row">
    <label for="alamat_sekolah" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Sekolah') }}</label>

    <div class="col-md-6">
        <input id="alamat_sekolah" type="text" class="form-control @error('alamat_sekolah') is-invalid @enderror"
            name="alamat_sekolah" value="{{ old('alamat_sekolah') }}" autocomplete="alamat_sekolah" required
            data-validation-required-message="This field is required">


    </div>
</div>

<div class="form-group row">
    <label for="nama_operator" class="col-md-4 col-form-label text-md-right">{{ __('Nama Operator Sekolah') }}</label>

    <div class="col-md-6">
        <input id="nama_operator" type="text" class="form-control @error('nama_operator') is-invalid @enderror"
            name="nama_operator" value="{{ old('nama_operator') }}" autocomplete="nama_operator" required
            data-validation-required-message="This field is required">
    </div>
</div>

<div class="form-group row">
    <label for="telepon_operator"
        class="col-md-4 col-form-label text-md-right">{{ __('Telepon Operator Sekolah') }}</label>

    <div class="col-md-6">
        <input id="telepon_operator" type="number" class="form-control @error('telepon_operator') is-invalid @enderror"
            name="telepon_operator" value="{{ old('telepon_operator') }}" autocomplete="telepon_operator" required
            data-validation-required-message="This field is required">
    </div>
</div>

<div class="form-group row">
    <label for="email_operator"
        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Operator Sekolah') }}</label>

    <div class="col-md-6">
        <input id="email_operator" type="email_operator"
            class="form-control @error('email_operator') is-invalid @enderror" name="email_operator"
            value="{{ old('email_operator') }}" autocomplete="email_operator" required
            data-validation-required-message="This field is required">
    </div>
</div>

<div class="form-group row">
    <label for="letak_sekolah" class="col-md-4 col-form-label text-md-right">{{ __('Letak Sekolah') }}</label>

    <div class="col-md-6">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="letak_sekolah" id="inlineRadio1" value="1" checked>
            <label class="form-check-label" for="inlineRadio1">Pusat Kota</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="letak_sekolah" id="inlineRadio2" value="2"
                {{ old('letak_sekolah == 2') ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineRadio2">Tepi Kota</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="letak_sekolah" id="inlineRadio3" value="3"
                {{ old('letak_sekolah == 3') ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineRadio3">Pedesaan</label>
        </div>

        <div class="mt-3">
            <input type="file" class="form-control-file" id="file_peta_lokasi" name="file_peta_lokasi" required
                data-validation-required-message="This field is required">
            <small class="text-small">Upload peta lokasi</small>
        </div>
        <div class="mt-3">
            <input type="file" class="form-control-file" id="file_foto_sekolah" name="file_foto_sekolah" required
                data-validation-required-message="This field is required">
            <small class="text-small">Upload foto sekolah</small>
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="luas_total" class="col-md-4 col-form-label text-md-right">{{ __('Luas Total Area Sekolah') }}</label>

    <div class="col-md-6">
        <input id="luas_total" type="number" class="form-control @error('luas_total') is-invalid @enderror"
            name="luas_total" value="{{ old('luas_total') }}" autocomplete="luas_total" required
            data-validation-required-message="This field is required">
        <div class="mt-3">
            <input type="file" class="form-control-file" id="file_masterplan" name="file_masterplan" required
                data-validation-required-message="This field is required">
            <small class="text-small">Upload masterplan sekolah</small>
        </div>
    </div>

    <div class="col-md-2">
        <p>m2</p>
    </div>
</div>

<div class="form-group row">
    <label for="luas_area" class="col-md-4 col-form-label text-md-right">{{ __('Luas Area Terbangun') }}</label>

    <div class="col-md-6">
        <input id="luas_area" type="number" class="form-control @error('luas_area') is-invalid @enderror"
            name="luas_area" value="{{ old('luas_area') }}" autocomplete="luas_area" required
            data-validation-required-message="This field is required">
        <div class="mt-3">
            <input type="file" class="form-control-file" id="file_luas_area" name="file_luas_area" required
                data-validation-required-message="This field is required">
            <small class="text-small">Upload daftar tabel luas bangunan yang ada</small>
        </div>
    </div>
    <div class="col-md-2">
        <p>m2</p>
    </div>
</div>

<div class="form-group row">
    <label for="luas_area_hijau"
        class="col-md-4 col-form-label text-md-right">{{ __('Luas area terbuka hijau') }}</label>

    <div class="col-md-6">
        <input id="luas_area_hijau" type="number" class="form-control @error('luas_area_hijau') is-invalid @enderror"
            name="luas_area_hijau" value="{{ old('luas_area_hijau') }}" autocomplete="luas_area_hijau" required
            data-validation-required-message="This field is required">
        <div class="mt-3">
            <input type="file" class="form-control-file" id="file_luas_area_hijau" name="file_luas_area_hijau" required
                data-validation-required-message="This field is required">
            <small class="text-small">Upload daftar tabel luas area ruang terbuka</small>
        </div>
    </div>
    <div class="col-md-2">
        <p>m2</p>
    </div>
</div>

<div class="form-group row">
    <label for="jumlah_guru" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Guru dan Karyawan') }}</label>

    <div class="col-md-6">
        <input id="jumlah_guru" type="number" class="form-control @error('jumlah_guru') is-invalid @enderror"
            name="jumlah_guru" value="{{ old('jumlah_guru') }}" autocomplete="jumlah_guru" required
            data-validation-required-message="This field is required">
        <div class="mt-3">
            <input type="file" class="form-control-file" id="file_guru_karyawan" name="file_guru_karyawan" required
                data-validation-required-message="This field is required">
            <small class="text-small">Upload daftar</small>
        </div>
    </div>
    <div class="col-md-2">
        <p>orang</p>
    </div>
</div>

<div class="form-group row">
    <label for="jumlah_siswa" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Siswa') }}</label>

    <div class="col-md-6">
        <input id="jumlah_siswa" type="number" class="form-control @error('jumlah_siswa') is-invalid @enderror"
            name="jumlah_siswa" value="{{ old('jumlah_siswa') }}" autocomplete="jumlah_siswa" required
            data-validation-required-message="This field is required">
        <div class="mt-3">
            <input type="file" class="form-control-file" id="file_jumlah_siswa" name="file_jumlah_siswa" required
                data-validation-required-message="This field is required">
            <small class="text-small">Upload daftar</small>
            @error('file_jumlah_siswa')
            <div class="mt-2 text-danger">
                <small><b>{{ $message }}</b></small>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <p>orang</p>
    </div>
</div>
