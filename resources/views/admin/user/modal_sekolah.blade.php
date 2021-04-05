<div class="modal bs-example-modal-lg fade" id="modal_add_sekolah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_add_sekolah" name="form_add_sekolah" enctype="multipart/form-data">
                    @include('admin.user.partials.form-control')
            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" id="btn-save-sekolah" class="btn btn-bold btn-pure btn-primary float-right"><i
                        class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
        $('#form_add_sekolah').on('submit',(function(e) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        $('#btn-save-sekolah').html('Mengirim...');
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ route('user.create.sekolah') }}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log(data);
        $('#btn-save-sekolah').html(data.success);
          if (data.hasOwnProperty('nama_sekolah')) {
            // var response = `<tr><td>Sekolah</tr></td><tr><td>${data.nama_sekolah}</tr></td><tr><td>${data.nama_operator}</tr></td><tr><td>${data.email_operator}</tr></td>`;
            var respon = '<tr><td>'+'Sekolah'+'</td><td>'+data.nama_sekolah+'</td><td>'+data.nama_operator+'</td><td>'+data.email_operator+'</td></tr>'
            $('#tbl-indikator').append(respon);
            document.getElementById("form_add_sekolah").reset();
          }
          $('#modal_add_sekolah').modal('hide');
        },
        error: function(data){
          $('#btn-save-sekolah').html('Gagal');
          console.log(data);
        }
      });
    }));
  });
</script>
