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
                    @include('admin.user.partials.form-control')
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
