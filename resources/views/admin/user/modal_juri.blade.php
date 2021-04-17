<div class="modal bs-example-modal-lg fade" id="modal_add_juri" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Juri</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_add_juri" name="form_add_juri" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Juri') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus required
                                data-validation-required-message="This field is required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email" autofocus required
                                data-validation-required-message="This field is required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <p>gsrunnes</p>
                        </div>
                    </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" id="btn-save-juri" class="btn btn-bold btn-pure btn-primary float-right"><i
                        class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
        $('#form_add_juri').on('submit',(function(e) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        $('#btn-save-juri').html('Mengirim...');
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ route('user.create.juri') }}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log(data);
        $('#btn-save-juri').html(data.success);
          if (data.hasOwnProperty('name')) {
            // var response = `<tr><td>Sekolah</tr></td><tr><td>${data.nama_sekolah}</tr></td><tr><td>${data.nama_operator}</tr></td><tr><td>${data.email_operator}</tr></td>`;
            var respon = '<tr><td>'+'Juri'+'</td><td>'+data.name+'</td><td>'+data.email+'</td></tr>'
            $('#tbl-juri').append(respon);
            document.getElementById("form_add_juri").reset();
            location.reload();
          }
          $('#modal_add_juri').modal('hide');
          location.reload();
        },
        error: function(data){
          $('#btn-save-juri').html('Gagal');
          console.log(data);
        }
      });
    }));
  });
</script>
