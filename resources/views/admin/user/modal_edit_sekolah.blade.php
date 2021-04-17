@foreach ($sekolah as $skl)
<div class="modal bs-example-modal-lg fade" id="modal_edit_sekolah{{ $skl->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_sekolah{{ $skl->id }}" name="form_edit_sekolah{{ $skl->id }}"
                    enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="npsn" class="col-md-4 col-form-label text-md-right">{{ __('NPSN') }}</label>

                        <div class="col-md-6">
                            <input id="npsn" type="text" class="form-control @error('npsn') is-invalid @enderror"
                                name="npsn" value="{{ old('npsn') ?? $skl->npsn }}" autocomplete="npsn" autofocus
                                required data-validation-required-message="This field is required">
                            <input type="text" name="file_npsn" value="{{ $skl->file_npsn }}" hidden>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_sekolah"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nama Sekolah') }}</label>

                        <div class="col-md-6">
                            <input id="nama_sekolah" type="text"
                                class="form-control @error('nama_sekolah') is-invalid @enderror" name="nama_sekolah"
                                value="{{ old('nama_sekolah') ?? $skl->nama_sekolah }}" autocomplete="nama_sekolah"
                                required data-validation-required-message="This field is required">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat_sekolah"
                            class="col-md-4 col-form-label text-md-right">{{ __('Alamat Sekolah') }}</label>

                        <div class="col-md-6">
                            <input id="alamat_sekolah" type="text"
                                class="form-control @error('alamat_sekolah') is-invalid @enderror" name="alamat_sekolah"
                                value="{{ old('alamat_sekolah') ?? $skl->alamat_sekolah }}"
                                autocomplete="alamat_sekolah" required
                                data-validation-required-message="This field is required">


                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_operator"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nama Operator Sekolah') }}</label>

                        <div class="col-md-6">
                            <input id="nama_operator" type="text"
                                class="form-control @error('nama_operator') is-invalid @enderror" name="nama_operator"
                                value="{{ old('nama_operator') ?? $skl->nama_operator }}" autocomplete="nama_operator"
                                required data-validation-required-message="This field is required">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telepon_operator"
                            class="col-md-4 col-form-label text-md-right">{{ __('Telepon Operator Sekolah') }}</label>

                        <div class="col-md-6">
                            <input id="telepon_operator" type="number"
                                class="form-control @error('telepon_operator') is-invalid @enderror"
                                name="telepon_operator" value="{{ old('telepon_operator') ?? $skl->telepon_operator }}"
                                autocomplete="telepon_operator" required
                                data-validation-required-message="This field is required">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email_operator"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Operator Sekolah') }}</label>

                        <div class="col-md-6">
                            <input id="email_operator" type="email_operator"
                                class="form-control @error('email_operator') is-invalid @enderror" name="email_operator"
                                value="{{ old('email_operator') ?? $skl->email_operator }}"
                                autocomplete="email_operator" required
                                data-validation-required-message="This field is required">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="letak_sekolah"
                            class="col-md-4 col-form-label text-md-right">{{ __('Letak Sekolah') }}</label>

                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="letak_sekolah" id="inlineRadio1"
                                    value="1" checked>
                                <label class="form-check-label" for="inlineRadio1">Pusat Kota</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="letak_sekolah" id="inlineRadio2"
                                    value="2" {{ (old('letak_sekolah') || $skl->letak_sekolah) == 2 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Tepi Kota</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="letak_sekolah" id="inlineRadio3"
                                    value="3"
                                    {{ (old('letak_sekolah') == 3 || $skl->letak_sekolah) == 3 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio3">Pedesaan</label>
                            </div>
                            <input type="text" name="file_peta_lokasi" value="{{ $skl->file_peta_lokasi }}" hidden>
                            <input type="text" name="file_foto_sekolah" value="{{ $skl->file_foto_sekolah }}" hidden>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="luas_total"
                            class="col-md-4 col-form-label text-md-right">{{ __('Luas Total Area Sekolah') }}</label>

                        <div class="col-md-6">
                            <input id="luas_total" type="number"
                                class="form-control @error('luas_total') is-invalid @enderror" name="luas_total"
                                value="{{ old('luas_total') ?? $skl->luas_total }}" autocomplete="luas_total" required
                                data-validation-required-message="This field is required">
                            <input type="text" name="file_masterplan" value="{{ $skl->file_masterplan }}" hidden>
                        </div>

                        <div class="col-md-2">
                            <p>m2</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="luas_area"
                            class="col-md-4 col-form-label text-md-right">{{ __('Luas Area Terbangun') }}</label>

                        <div class="col-md-6">
                            <input id="luas_area" type="number"
                                class="form-control @error('luas_area') is-invalid @enderror" name="luas_area"
                                value="{{ old('luas_area') ?? $skl->luas_area }}" autocomplete="luas_area" required
                                data-validation-required-message="This field is required">
                            <input type="text" name="file_luas_area" value="{{ $skl->file_luas_area }}" hidden>
                        </div>
                        <div class="col-md-2">
                            <p>m2</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="luas_area_hijau"
                            class="col-md-4 col-form-label text-md-right">{{ __('Luas area terbuka hijau') }}</label>

                        <div class="col-md-6">
                            <input id="luas_area_hijau" type="number"
                                class="form-control @error('luas_area_hijau') is-invalid @enderror"
                                name="luas_area_hijau" value="{{ old('luas_area_hijau') ?? $skl->luas_area_hijau }}"
                                autocomplete="luas_area_hijau" required
                                data-validation-required-message="This field is required">
                            <input type="text" name="file_luas_area_hijau" value="{{ $skl->file_luas_area_hijau }}"
                                hidden>
                        </div>
                        <div class="col-md-2">
                            <p>m2</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jumlah_guru"
                            class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Guru dan Karyawan') }}</label>

                        <div class="col-md-6">
                            <input id="jumlah_guru" type="number"
                                class="form-control @error('jumlah_guru') is-invalid @enderror" name="jumlah_guru"
                                value="{{ old('jumlah_guru') ?? $skl->jumlah_guru }}" autocomplete="jumlah_guru"
                                required data-validation-required-message="This field is required">
                            <input type="text" name="file_guru_karyawan" value="{{ $skl->file_guru_karyawan }}" hidden>
                        </div>
                        <div class="col-md-2">
                            <p>orang</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jumlah_siswa"
                            class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Siswa') }}</label>

                        <div class="col-md-6">
                            <input id="jumlah_siswa" type="number"
                                class="form-control @error('jumlah_siswa') is-invalid @enderror" name="jumlah_siswa"
                                value="{{ old('jumlah_siswa') ?? $skl->jumlah_siswa }}" autocomplete="jumlah_siswa"
                                required data-validation-required-message="This field is required">
                            <input type="text" name="file_jumlah_siswa" value="{{ $skl->file_jumlah_siswa }}" hidden>
                        </div>
                        <div class="col-md-2">
                            <p>orang</p>
                        </div>
                    </div>

            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" id="btn-edit-sekolah{{ $skl->id }}"
                    class="btn btn-bold btn-pure btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
        $('#form_edit_sekolah{{ $skl->id }}').on('submit',(function(e) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        $('#btn-edit-sekolah{{ $skl->id }}').html('Mengirim...');
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ route('user.edit.sekolah', $skl) }}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log(data);
        $('#btn-edit-sekolah{{ $skl->id }}').html(data.success);
        //   if (data.hasOwnProperty('nama_sekolah')) {
            // var response = `<tr><td>Sekolah</tr></td><tr><td>${data.nama_sekolah}</tr></td><tr><td>${data.nama_operator}</tr></td><tr><td>${data.email_operator}</tr></td>`;
        //     var respon = '<tr><td>'+'Sekolah'+'</td><td>'+data.nama_sekolah+'</td><td>'+data.nama_operator+'</td><td>'+data.email_operator+'</td></tr>'
        //     $('#tbl-indikator').append(respon);
        //     document.getElementById("form_edit_sekolah").reset();
        //   }
          $('#modal_edit_sekolah{{ $skl->id }}').modal('hide');
        },
        error: function(data){
          $('#btn-save-sekolah{{ $skl->id }}').html('Gagal');
          console.log(data);
        }
      });
    }));
  });
</script>

@endforeach
